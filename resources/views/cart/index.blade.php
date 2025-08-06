@extends('layouts.public')

@section('title', 'Mon Panier')
@section('description', 'Gérez les produits de votre panier sur Luxylia')

@section('content')
<div class="bg-white min-h-screen">
    <!-- En-tête -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-white sm:text-5xl">
                    Mon Panier
                </h1>
                <p class="mt-4 text-xl text-indigo-100">
                    Gérez vos produits avant de finaliser votre commande
                </p>
                <div class="mt-6">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white bg-opacity-20 text-white">
                        {{ $cartItems->count() }} {{ $cartItems->count() > 1 ? 'articles' : 'article' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($cartItems->count() > 0)
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                <!-- Liste des articles -->
                <div class="lg:col-span-7">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900">Articles dans votre panier</h2>
                        </div>
                        
                        <ul class="divide-y divide-gray-200">
                            @foreach($cartItems as $item)
                                <li class="px-6 py-6 flex">
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('products.show', $item->product) }}" class="block">
                                            <div class="w-20 h-20 rounded-md overflow-hidden bg-gray-200 hover:shadow-md transition-shadow duration-200">
                                                <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-200"
                                                     src="{{ $item->product->main_image_url }}"
                                                     alt="{{ $item->product->name }}"
                                                     loading="lazy"
                                                     onerror="this.src='{{ $item->product->getPlaceholderImage() }}'">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="ml-6 flex-1 flex flex-col">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-sm">
                                                    <a href="{{ route('products.show', $item->product) }}" 
                                                       class="font-medium text-gray-700 hover:text-gray-800">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-500">{{ $item->product->category->name ?? 'Sans catégorie' }}</p>
                                                <p class="mt-1 text-sm font-medium text-gray-900">${{ number_format($item->price, 2) }}</p>
                                            </div>

                                            <div class="ml-4">
                                                <form action="{{ route('cart.remove', $item) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-400 hover:text-red-500"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir retirer cet article ?')">
                                                        <span class="sr-only">Supprimer</span>
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9zM4 5a2 2 0 012-2h8a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 102 0v3a1 1 0 11-2 0V9zm4 0a1 1 0 10-2 0v3a1 1 0 102 0V9z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="flex-1 pt-2 flex items-end justify-between">
                                            <div class="flex items-center">
                                                <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <label for="quantity-{{ $item->id }}" class="sr-only">Quantité</label>
                                                    <select name="quantity" 
                                                            id="quantity-{{ $item->id }}"
                                                            class="rounded-md border border-gray-300 text-left text-base font-medium text-gray-700 shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                            onchange="this.form.submit()">
                                                        @for($i = 1; $i <= min(10, $item->product->stock); $i++)
                                                            <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </form>
                                            </div>

                                            <div class="text-sm">
                                                <p class="text-gray-900 font-medium">
                                                    Sous-total: ${{ number_format($item->price * $item->quantity, 2) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Actions du panier -->
                    <div class="mt-6 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('products.index') }}" 
                           class="flex-1 bg-white border border-gray-300 rounded-md shadow-sm px-6 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center">
                            Continuer mes achats
                        </a>
                        
                        <form action="{{ route('cart.clear') }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-red-600 border border-transparent rounded-md shadow-sm px-6 py-3 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                    onclick="return confirm('Êtes-vous sûr de vouloir vider votre panier ?')">
                                Vider le panier
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Résumé de la commande -->
                <div class="mt-16 lg:mt-0 lg:col-span-5">
                    <div class="bg-gray-50 rounded-lg px-6 py-6 lg:p-8">
                        <h2 class="text-lg font-medium text-gray-900">Résumé de la commande</h2>
                        
                        <dl class="mt-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-gray-600">Sous-total</dt>
                                <dd class="text-sm font-medium text-gray-900">${{ number_format($total, 2) }}</dd>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt class="text-base font-medium text-gray-900">Total</dt>
                                <dd class="text-base font-medium text-gray-900">${{ number_format($total, 2) }}</dd>
                            </div>
                        </dl>

                        <div class="mt-6">
                            <a href="{{ route('checkout.index') }}" 
                               class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm px-6 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center justify-center">
                                Procéder au paiement
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-500">
                                Livraison et taxes calculées lors du paiement
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Panier vide -->
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 11-4 0v-6m4 0V9a2 2 0 10-4 0v4.01"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-medium text-gray-900 mb-2">Votre panier est vide</h3>
                <p class="text-gray-500 mb-8">Découvrez nos produits et ajoutez-les à votre panier</p>

                <!-- Produits suggérés -->
                @php
                    $featuredProducts = \App\Models\Product::where('is_featured', true)->where('is_active', true)->take(4)->get();
                @endphp

                @if($featuredProducts->count() > 0)
                    <div class="mb-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Produits populaires</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                            @foreach($featuredProducts as $product)
                                <a href="{{ route('products.show', $product) }}" class="group">
                                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                                        <div class="aspect-w-1 aspect-h-1 bg-gray-100">
                                            <img class="w-full h-24 object-cover group-hover:scale-105 transition-transform duration-200"
                                                 src="{{ $product->main_image_url }}"
                                                 alt="{{ $product->name }}"
                                                 loading="lazy"
                                                 onerror="this.src='{{ $product->getPlaceholderImage() }}'">
                                        </div>
                                        <div class="p-2">
                                            <h5 class="text-xs font-medium text-gray-900 truncate">{{ $product->name }}</h5>
                                            <p class="text-xs text-indigo-600 font-semibold">${{ number_format($product->price, 2) }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Découvrir nos produits
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
