<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderProduct;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer des utilisateurs et produits existants
        $users = User::where('role', 'client')->get();
        $products = Product::where('is_active', true)->get();

        if ($users->isEmpty() || $products->isEmpty()) {
            $this->command->info('Aucun utilisateur client ou produit trouvé. Veuillez d\'abord créer des utilisateurs et des produits.');
            return;
        }

        // Générer des commandes pour les 6 derniers mois
        for ($i = 0; $i < 50; $i++) {
            $user = $users->random();
            $orderDate = Carbon::now()->subDays(rand(0, 180)); // 6 mois

            // Créer la commande
            $order = Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'user_id' => $user->id,
                'subtotal' => 0, // Sera calculé après
                'tax' => 0,
                'shipping' => rand(0, 1) ? 5.99 : 0, // Livraison gratuite parfois
                'discount' => 0,
                'total' => 0, // Sera calculé après
                'status' => collect(['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->random(),
                'payment_status' => collect(['pending', 'paid', 'failed'])->random(),
                'payment_method' => collect(['card', 'paypal', 'bank_transfer'])->random(),

                // Adresse de facturation
                'billing_name' => $user->name,
                'billing_email' => $user->email,
                'billing_phone' => fake()->phoneNumber(),
                'billing_address' => fake()->streetAddress(),
                'billing_city' => fake()->city(),
                'billing_state' => fake()->state(),
                'billing_postal_code' => fake()->postcode(),
                'billing_country' => 'France',

                // Adresse de livraison
                'shipping_name' => $user->name,
                'shipping_email' => $user->email,
                'shipping_phone' => fake()->phoneNumber(),
                'shipping_address' => fake()->streetAddress(),
                'shipping_city' => fake()->city(),
                'shipping_state' => fake()->state(),
                'shipping_postal_code' => fake()->postcode(),
                'shipping_country' => 'France',

                'notes' => rand(0, 1) ? fake()->sentence() : null,
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            // Ajouter des produits à la commande
            $orderProducts = $products->random(rand(1, 4));
            $subtotal = 0;

            foreach ($orderProducts as $product) {
                $quantity = rand(1, 3);
                $unitPrice = $product->price;
                $totalPrice = $unitPrice * $quantity;

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'seller_id' => $product->user_id,
                    'product_name' => $product->name,
                    'product_sku' => $product->sku,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total_price' => $totalPrice,
                ]);

                $subtotal += $totalPrice;
            }

            // Calculer le total
            $tax = $subtotal * 0.20; // TVA 20%
            $total = $subtotal + $tax + $order->shipping - $order->discount;

            // Mettre à jour la commande
            $order->update([
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
            ]);
        }

        $this->command->info('50 commandes de test créées avec succès !');
    }
}
