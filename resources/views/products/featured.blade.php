@extends('layouts.public')

@section('title', 'Produits en Vedette')
@section('description', 'Découvrez notre sélection de produits vedette sur Luxylia')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white bg-opacity-20 backdrop-blur-sm rounded-full mb-6">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
                    Produits
                    <span class="bg-gradient-to-r from-white to-yellow-100 bg-clip-text text-transparent">
                        Vedette
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-orange-100 max-w-3xl mx-auto mb-8">
                    Notre sélection premium des produits les plus appréciés et tendances
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-white">
                    <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        Qualité exceptionnelle
                    </div>
                    <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Très appréciés
                    </div>
                    <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-full">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Tendances
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-5 rounded-full"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white opacity-5 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white opacity-3 rounded-full"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Introduction -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Pourquoi ces produits sont
                <span class="bg-gradient-to-r from-yellow-500 to-orange-500 bg-clip-text text-transparent">
                    exceptionnels ?
                </span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                Chaque produit vedette est soigneusement sélectionné selon des critères stricts de qualité, 
                popularité et satisfaction client. Découvrez ce qui fait leur succès.
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-500 to-orange-500 mx-auto rounded-full"></div>
        </div>

        <!-- Grille des produits -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-16">
                @foreach($products as $product)
                    <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100">
                        <!-- Badge vedette premium -->
                        <div class="absolute top-3 left-3 z-10">
                            <div class="relative">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-yellow-400 to-orange-400 text-white shadow-lg">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    Vedette
                                </span>
                                <!-- Glow effect -->
                                <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full opacity-30 blur-md animate-pulse"></div>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="relative aspect-w-1 aspect-h-1 bg-gradient-to-br from-yellow-50 to-orange-50 overflow-hidden">
                            <img src="{{ $product->main_image_url }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700"
                                 loading="lazy">
                            
                            <!-- Badges supplémentaires -->
                            <div class="absolute top-3 right-3 flex flex-col gap-2">
                                @if($product->hasDiscount())
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-red-500 text-white shadow-lg">
                                        -{{ $product->discount_percentage }}%
                                    </span>
                                @endif
                                @if($product->isInStock())
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        En stock
                                    </span>
                                @endif
                            </div>

                            <!-- Overlay premium -->
                            <div class="absolute inset-0 bg-gradient-to-t from-yellow-900 via-transparent to-transparent opacity-0 group-hover:opacity-40 transition-opacity duration-500"></div>
                        </div>

                        <!-- Contenu -->
                        <div class="p-6 space-y-4">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-orange-600 transition-colors duration-300 line-clamp-2">
                                    {{ $product->name }}
                                </h3>
                                @if($product->brand)
                                    <p class="text-sm text-gray-500 font-medium">{{ $product->brand }}</p>
                                @endif
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
                                    @if($product->hasDiscount())
                                        <div class="flex items-center gap-2">
                                            <span class="text-xl font-bold text-red-600">{{ number_format($product->discounted_price, 2) }}€</span>
                                            <span class="text-sm text-gray-500 line-through">{{ number_format($product->price, 2) }}€</span>
                                        </div>
                                    @else
                                        <span class="text-xl font-bold text-gray-900">{{ number_format($product->price, 2) }}€</span>
                                    @endif
                                </div>
                                
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">Vendu par</p>
                                    <p class="text-sm font-medium text-gray-700">{{ $product->user->name }}</p>
                                </div>
                            </div>

                            @if($product->description)
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $product->description }}</p>
                            @endif

                            <!-- Actions premium -->
                            <div class="flex gap-3 pt-4 border-t border-gray-100">
                                <a href="{{ route('products.show', $product) }}" 
                                   class="flex-1 text-center px-4 py-2 border border-orange-300 text-orange-600 rounded-xl hover:bg-orange-50 transition-all duration-300 font-medium">
                                    Voir détails
                                </a>
                                
                                @auth
                                    @if($product->isInStock())
                                        <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-1">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="w-full px-4 py-2 bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white rounded-xl transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9m-9 0h9"></path>
                                                </svg>
                                                Ajouter
                                            </button>
                                        </form>
                                    @else
                                        <button disabled class="flex-1 px-4 py-2 bg-gray-300 text-gray-500 rounded-xl cursor-not-allowed font-medium">
                                            Rupture
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="flex-1 text-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-xl hover:from-yellow-600 hover:to-orange-600 transition-all duration-300 font-medium">
                                        Connexion
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Call to action -->
            <div class="text-center bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-12 border border-yellow-200">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    Vous voulez découvrir plus de produits ?
                </h3>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Explorez notre catalogue complet et trouvez exactement ce que vous cherchez parmi des milliers de produits de qualité.
                </p>
                <a href="{{ route('products.index') }}" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Voir tous les produits
                </a>
            </div>
        @else
            <!-- Aucun produit vedette -->
            <div class="text-center py-20">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Aucun produit vedette pour le moment</h3>
                    <p class="text-gray-600 mb-8">Nos équipes travaillent à sélectionner les meilleurs produits pour vous.</p>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl">
                        Découvrir tous les produits
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

