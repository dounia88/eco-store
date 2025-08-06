@extends('layouts.public')

@section('title', 'Tous les Produits')
@section('description', 'Découvrez tous nos produits sur Luxylia - Votre marketplace de confiance')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
                    Tous nos
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        Produits
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-indigo-100 max-w-3xl mx-auto mb-8">
                    Découvrez notre collection exceptionnelle de produits soigneusement sélectionnés
                </p>
                <div class="inline-flex items-center px-6 py-3 rounded-full bg-white bg-opacity-20 backdrop-blur-sm text-white font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    {{ $products->total() }} {{ $products->total() > 1 ? 'produits' : 'produit' }} disponible{{ $products->total() > 1 ? 's' : '' }}
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-5 rounded-full"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white opacity-5 rounded-full"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Filtres -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                Filtrer les produits
            </h2>
            
            <form method="GET" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Recherche -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Rechercher</label>
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Nom, marque, description..." 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                            <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Catégorie -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select name="category" class="w-full py-3 px-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Prix -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Prix min</label>
                            <input type="number" name="min_price" value="{{ request('min_price') }}" 
                                   placeholder="0€" min="0" step="0.01"
                                   class="w-full py-3 px-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Prix max</label>
                            <input type="number" name="max_price" value="{{ request('max_price') }}" 
                                   placeholder="1000€" min="0" step="0.01"
                                   class="w-full py-3 px-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                        </div>
                    </div>

                    <!-- Tri -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Trier par</label>
                        <select name="sort" class="w-full py-3 px-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                            <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Plus récents</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nom A-Z</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Popularité</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex flex-wrap gap-2">
                        @if(request()->hasAny(['search', 'category', 'min_price', 'max_price', 'sort']))
                            @if(request('search'))
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-indigo-100 text-indigo-800">
                                    Recherche: "{{ request('search') }}"
                                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-2 text-indigo-600 hover:text-indigo-800">×</a>
                                </span>
                            @endif
                            @if(request('category'))
                                @php $selectedCategory = $categories->find(request('category')) @endphp
                                @if($selectedCategory)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-800">
                                        {{ $selectedCategory->name }}
                                        <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="ml-2 text-purple-600 hover:text-purple-800">×</a>
                                    </span>
                                @endif
                            @endif
                        @endif
                    </div>
                    
                    <div class="flex gap-3">
                        <a href="{{ route('products.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300 font-medium">
                            Réinitialiser
                        </a>
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                            Appliquer les filtres
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Grille des produits -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                    @php
                        $slug = Str::slug($product->name, '-');
                        $extensions = ['svg', 'jpeg', 'jpg', 'png', 'webp'];
                        $imagePath = null;
                        foreach ($extensions as $ext) {
                            $tryPath = "images/products/{$slug}.{$ext}";
                            if (file_exists(public_path($tryPath))) {
                                $imagePath = asset($tryPath);
                                break;
                            }
                        }
                    @endphp
                    <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100">
                        <!-- Image -->
                        <div class="relative aspect-w-1 aspect-h-1 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                            @if($imagePath)
                                <img src="{{ $imagePath }}" alt="{{ $product->name }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            @else
                                <img src="{{ $product->getPlaceholderImage() }}" alt="Image par défaut" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            @endif
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-col gap-2">
                                @if($product->is_featured)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-yellow-400 to-orange-400 text-white shadow-lg">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        Vedette
                                    </span>
                                @endif
                                @if($product->hasDiscount())
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-red-500 text-white shadow-lg">
                                        -{{ $product->discount_percentage }}%
                                    </span>
                                @endif
                            </div>

                            <!-- Stock badge -->
                            <div class="absolute top-3 right-3">
                                @if($product->isInStock())
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        En stock
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Rupture
                                    </span>
                                @endif
                            </div>

                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-60 transition-opacity duration-500"></div>
                        </div>

                        <!-- Contenu -->
                        <div class="p-6 space-y-4">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition-colors duration-300 line-clamp-2">
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

                            <!-- Actions -->
                            <div class="flex gap-3 pt-4 border-t border-gray-100">
                                <a href="{{ route('products.show', $product) }}" 
                                   class="flex-1 text-center px-4 py-2 border border-indigo-300 text-indigo-600 rounded-xl hover:bg-indigo-50 transition-all duration-300 font-medium">
                                    Voir détails
                                </a>
                                
                                @auth
                                    @if($product->isInStock())
                                        <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-1">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="w-full px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-xl transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
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
                                    <a href="{{ route('login') }}" class="flex-1 text-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-medium">
                                        Connexion
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $products->appends(request()->query())->links() }}
            </div>
        @else
            <!-- Aucun produit -->
            <div class="text-center py-20">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-8V4a1 1 0 00-1-1H7a1 1 0 00-1 1v1m8 0V4a1 1 0 00-1-1H9a1 1 0 00-1 1v1m4 0h-2m0 0V4a1 1 0 00-1-1v1a1 1 0 001 1m0 0h2m-6 0h2"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Aucun produit trouvé</h3>
                    <p class="text-gray-600 mb-8">Essayez de modifier vos critères de recherche ou explorez nos catégories.</p>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl">
                        Voir tous les produits
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

