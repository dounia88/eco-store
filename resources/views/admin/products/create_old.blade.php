@extends('layouts.admin')

@section('title', 'Créer un Produit')

@section('content')
<div class="min-h-screen bg-gray-50 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header amélioré -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Créer un Nouveau Produit</h1>
                            <p class="text-sm text-gray-600 mt-1">Ajoutez un nouveau produit à votre catalogue</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.products.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulaire avec onglets -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200" x-data="{ activeTab: 'basic' }">
            <!-- Navigation des onglets -->
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6" aria-label="Tabs">
                    <button type="button"
                            @click="activeTab = 'basic'"
                            :class="activeTab === 'basic' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informations de base
                        </div>
                    </button>
                    <button type="button"
                            @click="activeTab = 'pricing'"
                            :class="activeTab === 'pricing' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            Prix et stock
                        </div>
                    </button>
                    <button type="button"
                            @click="activeTab = 'media'"
                            :class="activeTab === 'media' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Images et médias
                        </div>
                    </button>
                    <button type="button"
                            @click="activeTab = 'advanced'"
                            :class="activeTab === 'advanced' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Options avancées
                        </div>
                    </button>
                </nav>
            </div>

            <!-- Contenu du formulaire -->
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Onglet Informations de base -->
                <div x-show="activeTab === 'basic'" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Colonne gauche -->
                        <div class="space-y-6">
                            <!-- Nom du produit -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label for="name" class="block text-sm font-semibold text-gray-900 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        Nom du produit *
                                    </span>
                                </label>
                                <input type="text"
                                       id="name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       placeholder="Ex: iPhone 15 Pro Max"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 ring-red-500 @enderror">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Catégorie -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label for="category_id" class="block text-sm font-semibold text-gray-900 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5"></path>
                                        </svg>
                                        Catégorie *
                                    </span>
                                </label>
                                <select id="category_id"
                                        name="category_id"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('category_id') border-red-500 ring-red-500 @enderror">
                                    <option value="">Sélectionnez une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Vendeur -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label for="user_id" class="block text-sm font-semibold text-gray-900 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Vendeur *
                                    </span>
                                </label>
                                <select id="user_id"
                                        name="user_id"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('user_id') border-red-500 ring-red-500 @enderror">
                                    <option value="">Sélectionnez un vendeur</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ old('user_id') == $vendor->id ? 'selected' : '' }}>
                                            {{ $vendor->name }} ({{ $vendor->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Colonne droite -->
                        <div class="space-y-6">
                            <!-- Description -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label for="description" class="block text-sm font-semibold text-gray-900 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Description *
                                    </span>
                                </label>
                                <textarea id="description"
                                          name="description"
                                          rows="6"
                                          required
                                          placeholder="Décrivez votre produit en détail..."
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-500 ring-red-500 @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Marque et Modèle -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label for="brand" class="block text-sm font-semibold text-gray-900 mb-3">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                            </svg>
                                            Marque
                                        </span>
                                    </label>
                                    <input type="text"
                                           id="brand"
                                           name="brand"
                                           value="{{ old('brand') }}"
                                           placeholder="Ex: Apple"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('brand') border-red-500 ring-red-500 @enderror">
                                    @error('brand')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <label for="model" class="block text-sm font-semibold text-gray-900 mb-3">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            Modèle
                                        </span>
                                    </label>
                                    <input type="text"
                                           id="model"
                                           name="model"
                                           value="{{ old('model') }}"
                                           placeholder="Ex: Pro Max"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 @error('model') border-red-500 ring-red-500 @enderror">
                                    @error('model')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prix et stock -->
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2">Prix et stock</h3>
                    
                    <!-- Prix -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Prix (€) *</label>
                        <input type="number" 
                               id="price" 
                               name="price" 
                               value="{{ old('price') }}" 
                               step="0.01" 
                               min="0" 
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prix de comparaison -->
                    <div>
                        <label for="compare_price" class="block text-sm font-medium text-gray-700 mb-2">Prix de comparaison (€)</label>
                        <input type="number" 
                               id="compare_price" 
                               name="compare_price" 
                               value="{{ old('compare_price') }}" 
                               step="0.01" 
                               min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('compare_price') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Prix barré pour montrer une remise</p>
                        @error('compare_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock *</label>
                        <input type="number" 
                               id="stock" 
                               name="stock" 
                               value="{{ old('stock') }}" 
                               min="0" 
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('stock') border-red-500 @enderror">
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image du produit</label>
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('image') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Formats acceptés: JPEG, PNG, JPG, GIF, SVG, WebP (max 2MB)</p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Options -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Options</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Statut actif -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Produit actif
                        </label>
                    </div>

                    <!-- Produit vedette -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="is_featured" 
                               name="is_featured" 
                               value="1" 
                               {{ old('is_featured') ? 'checked' : '' }}
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                            Produit vedette
                        </label>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" 
                   class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    Annuler
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-colors duration-200">
                    Créer le produit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
