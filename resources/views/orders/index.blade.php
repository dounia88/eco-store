@extends('layouts.app')

@section('title', 'Mes Commandes')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Mes Commandes</h1>
        <p class="text-gray-600">Suivez l'état de vos commandes et consultez votre historique d'achats</p>
    </div>

    <!-- Statistiques rapides -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Commandes</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $orders->total() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Commandes Livrées</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $orders->where('status', 'delivered')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">En Cours</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $orders->whereIn('status', ['pending', 'processing', 'shipped'])->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des commandes -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Historique des Commandes</h2>
        </div>
        
        <div class="p-6">
            @forelse($orders as $order)
                <div class="border border-gray-200 rounded-lg p-6 mb-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Commande #{{ $order->order_number }}</h3>
                                <p class="text-sm text-gray-500">{{ $order->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full
                                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $order->status === 'shipped' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $order->status === 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                @switch($order->status)
                                    @case('pending') En attente @break
                                    @case('processing') En traitement @break
                                    @case('shipped') Expédiée @break
                                    @case('delivered') Livrée @break
                                    @case('cancelled') Annulée @break
                                    @default {{ ucfirst($order->status) }}
                                @endswitch
                            </span>
                            <span class="text-lg font-bold text-gray-900">{{ number_format($order->total, 2) }}€</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Produits commandés</h4>
                                <div class="space-y-2">
                                    @foreach($order->orderProducts->take(3) as $orderProduct)
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-900">{{ $orderProduct->product_name }}</p>
                                                <p class="text-xs text-gray-500">Quantité: {{ $orderProduct->quantity }}</p>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ number_format($orderProduct->total_price, 2) }}€</span>
                                        </div>
                                    @endforeach
                                    @if($order->orderProducts->count() > 3)
                                        <p class="text-xs text-gray-500">+ {{ $order->orderProducts->count() - 3 }} autre(s) produit(s)</p>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Informations de livraison</h4>
                                <div class="text-sm text-gray-600">
                                    <p><strong>Adresse:</strong> {{ $order->shipping_address ?? 'Non spécifiée' }}</p>
                                    <p><strong>Méthode:</strong> {{ $order->shipping_method ?? 'Standard' }}</p>
                                    @if($order->tracking_number)
                                        <p><strong>Suivi:</strong> {{ $order->tracking_number }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                @if($order->status === 'pending')
                                    <form action="{{ route('orders.cancel', $order) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium"
                                                onclick="return confirm('Êtes-vous sûr de vouloir annuler cette commande ?')">
                                            Annuler la commande
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <a href="{{ route('orders.show', $order) }}"
                               class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Voir les détails
                                <svg class="ml-2 -mr-0.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- État vide -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune commande</h3>
                    <p class="mt-1 text-sm text-gray-500">Vous n'avez pas encore passé de commande.</p>
                    <div class="mt-6">
                        <a href="{{ route('home') }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Commencer mes achats
                        </a>
                    </div>
                </div>
            @endforelse

            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Section d'aide -->
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h3 class="text-lg font-medium text-blue-900 mb-2">Besoin d'aide ?</h3>
                <p class="text-blue-800 mb-4">
                    Si vous avez des questions concernant vos commandes ou si vous rencontrez des problèmes, 
                    notre équipe de support est là pour vous aider.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('chatify') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Chat Support
                    </a>
                    <a href="mailto:support@example.com" 
                       class="inline-flex items-center px-4 py-2 bg-white text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Email Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
