@extends('layouts.app')

@section('title', 'Détails de la commande #' . $order->order_number)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Commande #{{ $order->order_number }}</h1>
                <p class="text-gray-600">Passée le {{ $order->created_at->format('d/m/Y à H:i') }}</p>
            </div>
            <div class="text-right">
                <span class="px-4 py-2 text-sm font-medium rounded-full 
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
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Produits commandés -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Produits commandés</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach($order->orderProducts as $orderProduct)
                            <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                    @if($orderProduct->product && $orderProduct->product->images)
                                        <img src="{{ asset('storage/' . $orderProduct->product->images[0]) }}" 
                                             alt="{{ $orderProduct->product_name }}"
                                             class="w-full h-full object-cover rounded-lg">
                                    @else
                                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $orderProduct->product_name }}</h3>
                                    @if($orderProduct->product_sku)
                                        <p class="text-sm text-gray-500">SKU: {{ $orderProduct->product_sku }}</p>
                                    @endif
                                    <div class="mt-2 flex items-center space-x-4">
                                        <span class="text-sm text-gray-600">Quantité: {{ $orderProduct->quantity }}</span>
                                        <span class="text-sm text-gray-600">Prix unitaire: {{ number_format($orderProduct->unit_price, 2) }}€</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-lg font-bold text-gray-900">{{ number_format($orderProduct->total_price, 2) }}€</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Résumé de la commande -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Résumé</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sous-total</span>
                            <span class="font-medium">{{ number_format($order->subtotal ?? $order->total, 2) }}€</span>
                        </div>
                        @if($order->tax && $order->tax > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">TVA</span>
                                <span class="font-medium">{{ number_format($order->tax, 2) }}€</span>
                            </div>
                        @endif
                        @if($order->shipping && $order->shipping > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Livraison</span>
                                <span class="font-medium">{{ number_format($order->shipping, 2) }}€</span>
                            </div>
                        @endif
                        @if($order->discount && $order->discount > 0)
                            <div class="flex justify-between text-green-600">
                                <span>Remise</span>
                                <span class="font-medium">-{{ number_format($order->discount, 2) }}€</span>
                            </div>
                        @endif
                        <div class="border-t border-gray-200 pt-3">
                            <div class="flex justify-between">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-lg font-bold text-gray-900">{{ number_format($order->total, 2) }}€</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations de livraison -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Livraison</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm font-medium text-gray-900">Adresse de livraison</span>
                            <p class="text-sm text-gray-600 mt-1">{{ $order->shipping_address ?? 'Non spécifiée' }}</p>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-900">Méthode de livraison</span>
                            <p class="text-sm text-gray-600 mt-1">{{ $order->shipping_method ?? 'Standard' }}</p>
                        </div>
                        @if($order->tracking_number)
                            <div>
                                <span class="text-sm font-medium text-gray-900">Numéro de suivi</span>
                                <p class="text-sm text-gray-600 mt-1 font-mono">{{ $order->tracking_number }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6">
                    <div class="space-y-3">
                        @if($order->status === 'pending')
                            <form action="{{ route('orders.cancel', $order) }}" method="POST" class="w-full">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                        class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200"
                                        onclick="return confirm('Êtes-vous sûr de vouloir annuler cette commande ?')">
                                    Annuler la commande
                                </button>
                            </form>
                        @endif
                        
                        <a href="{{ route('orders.index') }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Retour aux commandes
                        </a>
                        
                        <a href="{{ route('chatify') }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Contacter le support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
