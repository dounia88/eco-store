@extends('layouts.public')

@section('title', 'Accueil - Luxylia')
@section('description', 'Découvrez Luxylia, votre marketplace premium avec des milliers de produits de luxe et de qualité')

@section('content')

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 text-white overflow-hidden">
        <!-- Background Pattern -->
        
        <div class="absolute w-full h-full inset-0 bg-[url('https://i.pinimg.com/736x/8c/55/de/8c55dee4be090a920e57cd9edb3885e0.jpg')] bg-no-repeat bg-cover "></div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white bg-opacity-10 rounded-full animate-pulse"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-purple-300 bg-opacity-20 rounded-full animate-bounce"></div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-pink-300 bg-opacity-15 rounded-full animate-pulse"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="text-center">
                <!-- Logo animé -->
                <div class="mb-8 flex justify-center">
                    <div class="relative">
                        <x-luxylia-logo class="h-20 w-auto text-white animate-pulse" />
                        <div class="absolute -inset-4 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full opacity-20 blur-xl"></div>
                    </div>
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 bg-gradient-to-r from-white via-purple-200 to-pink-200 bg-clip-text text-transparent">
                    Bienvenue sur Luxylia
                </h1>
                <p class="text-xl md:text-2xl mb-4 max-w-3xl mx-auto text-purple-100 leading-relaxed">
                    Votre marketplace premium où l'excellence rencontre l'innovation
                </p>
                <p class="text-lg mb-12 max-w-2xl mx-auto text-purple-200 opacity-90">
                    Découvrez des milliers de produits de luxe, soigneusement sélectionnés par nos vendeurs certifiés
                </p>

                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 max-w-4xl mx-auto">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white mb-2">10K+</div>
                        <div class="text-purple-200">Produits Premium</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white mb-2">500+</div>
                        <div class="text-purple-200">Vendeurs Certifiés</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white mb-2">50K+</div>
                        <div class="text-purple-200">Clients Satisfaits</div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('products.index') }}" class="group relative bg-white text-indigo-900 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-3xl">
                        <span class="relative z-10">Explorer les Produits</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                    </a>
                    <a href="{{ route('products.featured') }}" class="group relative border-2 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-indigo-900 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            Collection Vedette
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>

    <!-- Catégories populaires -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Explorez nos
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Collections
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Découvrez nos catégories soigneusement organisées pour une expérience d'achat exceptionnelle
                </p>
                <div class="mt-6 w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $categories = \App\Models\Category::active()->take(9)->get();

                // Fallback si pas assez de catégories en base
                if($categories->count() < 6) {
                    $defaultCategories = collect([
                        (object)['id' => 1, 'name' => 'Électronique', 'slug' => 'electronique', 'description' => 'Smartphones, ordinateurs, accessoires tech', 'image' => null],
                        (object)['id' => 2, 'name' => 'Mode & Beauté', 'slug' => 'mode-beaute', 'description' => 'Vêtements, chaussures, cosmétiques', 'image' => null],
                        (object)['id' => 3, 'name' => 'Maison & Jardin', 'slug' => 'maison-jardin', 'description' => 'Décoration, meubles, jardinage', 'image' => null],
                        (object)['id' => 4, 'name' => 'Sport & Loisirs', 'slug' => 'sport-loisirs', 'description' => 'Équipements sportifs, jeux, hobbies', 'image' => null],
                        (object)['id' => 5, 'name' => 'Auto & Moto', 'slug' => 'auto-moto', 'description' => 'Véhicules, pièces détachées, accessoires', 'image' => null],
                        (object)['id' => 6, 'name' => 'Livres & Culture', 'slug' => 'livres-culture', 'description' => 'Livres, musique, films, art', 'image' => null],
                        (object)['id' => 7, 'name' => 'Santé & Bien-être', 'slug' => 'sante-bien-etre', 'description' => 'Produits de santé, fitness, relaxation', 'image' => null],
                        (object)['id' => 8, 'name' => 'Enfants & Bébés', 'slug' => 'enfants-bebes', 'description' => 'Jouets, vêtements, puériculture', 'image' => null],
                        (object)['id' => 9, 'name' => 'Alimentation', 'slug' => 'alimentation', 'description' => 'Produits frais, épicerie, boissons', 'image' => null],
                    ]);
                    $categories = $categories->concat($defaultCategories)->take(9);
                }
            @endphp
            @foreach($categories as $category)
                <a href="{{ isset($category->id) && $category->id <= 1000 ? route('categories.index') : route('categories.show', $category) }}" class="group block">
                    <div class="relative bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100 overflow-hidden">
                        <!-- Background gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Content -->
                        <div class="relative z-10">
                            @if($category->image)
                                <div class="w-24 h-24 mx-auto mb-6 rounded-full overflow-hidden ring-4 ring-white shadow-lg">
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>
                            @else
                            @php
                                $categoryIcons = [
                                    'Électronique' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>',
                                    'Mode & Beauté' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>',
                                    'Maison & Jardin' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>',
                                    'Sport & Loisirs' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>',
                                    'Auto & Moto' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>',
                                    'Livres & Culture' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>',
                                    'Santé & Bien-être' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>',
                                    'Enfants & Bébés' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
                                    'Alimentation' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>'
                                ];
                                $iconPath = $categoryIcons[$category->name] ?? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>';
                            @endphp
                                <div class="relative w-24 h-24 mx-auto mb-6">
                                    <div class="w-full h-full bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 rounded-full flex items-center justify-center group-hover:from-indigo-200 group-hover:via-purple-200 group-hover:to-pink-200 transition-all duration-500 shadow-lg">
                                        <svg class="w-12 h-12 text-indigo-600 group-hover:text-purple-600 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            {!! $iconPath !!}
                                        </svg>
                                    </div>
                                    <!-- Glow effect -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full opacity-0 group-hover:opacity-20 blur-xl transition-opacity duration-500"></div>
                                </div>
                            @endif

                            <h3 class="text-2xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors duration-500 mb-3">
                                {{ $category->name }}
                            </h3>
                            @if($category->description)
                                <p class="text-gray-600 mb-6 line-clamp-2 leading-relaxed">{{ Str::limit($category->description, 100) }}</p>
                            @endif

                            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full text-sm font-medium group-hover:from-indigo-600 group-hover:to-purple-600 transition-all duration-500 transform group-hover:scale-105">
                                <span>Explorer</span>
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

            <!-- Bouton voir toutes les catégories -->
            <div class="text-center mt-16">
                <a href="{{ route('categories.index') }}" class="group relative inline-flex items-center px-12 py-4 border border-transparent text-lg font-bold rounded-full text-white bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-300 transform hover:scale-105 transition-all duration-500 shadow-2xl hover:shadow-3xl">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-full opacity-0 group-hover:opacity-30 blur-xl transition-opacity duration-500"></div>
                    <svg class="w-6 h-6 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5"></path>
                    </svg>
                    <span class="relative z-10">Découvrir Toutes les Collections</span>
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-1 transition-transform duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Produits en vedette -->
    <div class="relative bg-gradient-to-b from-white via-indigo-50 to-purple-50 py-20 overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-indigo-200 to-purple-200 rounded-full opacity-20 animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-24 h-24 bg-gradient-to-br from-purple-200 to-pink-200 rounded-full opacity-20 animate-pulse"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Nos
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Coups de Cœur
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-6">
                    Une sélection exclusive de produits premium, choisis avec soin pour leur qualité exceptionnelle
                </p>
                <div class="flex items-center justify-center space-x-2">
                    <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-pink-500 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $featuredProducts = \App\Models\Product::with(['category', 'user'])->featured()->active()->inStock()->take(4)->get();
                @endphp
                @foreach($featuredProducts as $product)
                    <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-3 transition-all duration-500 border border-gray-100">
                        <!-- Glow effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 opacity-0 group-hover:opacity-10 transition-opacity duration-500"></div>

                        <div class="relative aspect-w-1 aspect-h-1 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                            <img src="{{ $product->main_image_url }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-700"
                                 loading="lazy"
                                 onerror="this.src='{{ $product->getPlaceholderImage() }}'">

                            @if($product->hasDiscount())
                                <div class="absolute top-2 left-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        -{{ $product->discount_percentage }}%
                                    </span>
                                </div>
                            @endif

                            @if($product->is_featured)
                                <div class="absolute top-2 right-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        Vedette
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="mb-3">
                                <h3 class="font-bold text-lg text-gray-900 group-hover:text-indigo-600 transition-colors duration-300 line-clamp-2">
                                    <a href="{{ route('products.show', $product) }}" class="hover:underline">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $product->category->name ?? 'Sans catégorie' }}</p>
                            </div>

                            @if($product->description)
                                <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                            @endif

                            <div class="flex items-center justify-between mb-4">
                                <div class="flex flex-col">
                                    @if($product->hasDiscount())
                                        <div class="flex items-center space-x-2">
                                            <span class="text-xl font-bold text-red-600">{{ number_format($product->price, 2) }} €</span>
                                            <span class="text-sm text-gray-500 line-through">{{ number_format($product->compare_price, 2) }} €</span>
                                        </div>
                                    @else
                                        <span class="text-xl font-bold text-indigo-600">{{ number_format($product->price, 2) }} €</span>
                                    @endif
                                </div>

                                <div class="text-right">
                                    <div class="text-xs text-gray-500">Stock: {{ $product->stock }}</div>
                                    @if($product->user)
                                        <div class="text-xs text-gray-400">Par {{ $product->user->name }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium flex items-center">
                                    Voir détails
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>

                                @auth
                                    @if($product->isInStock())
                                        <form action="{{ route('cart.add', $product) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9m-9 0h9"></path>
                                                </svg>
                                                Ajouter
                                            </button>
                                        </form>
                                    @else
                                        <span class="bg-gray-300 text-gray-500 px-4 py-2 rounded-lg text-sm font-medium cursor-not-allowed">
                                            Rupture de stock
                                        </span>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                        Connexion
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('products.featured') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                    Voir tous les produits en vedette
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Marketplace</h3>
                    <p class="text-gray-300">
                        Votre destination en ligne pour trouver des produits de qualité vendus par des vendeurs de confiance.
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white">Produits</a></li>
                        <li><a href="{{ route('products.featured') }}" class="text-gray-300 hover:text-white">En vedette</a></li>
                        @auth
                            <li><a href="{{ route('orders.index') }}" class="text-gray-300 hover:text-white">Mes commandes</a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Aide</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Livraison</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
