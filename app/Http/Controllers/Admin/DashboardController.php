<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Traits\DatabaseCompatible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use DatabaseCompatible;
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        // Statistiques générales
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCategories = Category::count();

        // Chiffre d'affaires
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total');
        $monthlyRevenue = Order::where('payment_status', 'paid')
            ->whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth()
            ])
            ->sum('total');

        // Commandes récentes
        $recentOrders = Order::with(['user', 'orderProducts'])
            ->latest()
            ->limit(5)
            ->get();

        // Produits populaires
        $popularProducts = Product::with(['category', 'user'])
            ->orderBy('sales_count', 'desc')
            ->limit(5)
            ->get();

        // Vendeurs actifs
        $topSellers = User::withCount('products')
            ->whereHas('products')
            ->orderBy('products_count', 'desc')
            ->limit(5)
            ->get();

        // Statistiques des commandes par statut
        $orderStats = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        // Statistiques des ventes par mois (6 derniers mois)
        $monthlySales = $this->getMonthlySalesStats(
            Order::where('payment_status', 'paid'),
            'total',
            'created_at',
            6
        );

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalOrders',
            'totalCategories',
            'totalRevenue',
            'monthlyRevenue',
            'recentOrders',
            'popularProducts',
            'topSellers',
            'orderStats',
            'monthlySales'
        ));
    }


}
