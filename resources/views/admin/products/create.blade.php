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

                <!-- Onglet Prix et stock -->
                <div x-show="activeTab === 'pricing'" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Colonne gauche - Prix -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-6 border border-green-200">
                                <h3 class="text-lg font-semibold text-green-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    Tarification
                                </h3>

                                <!-- Prix principal -->
                                <div class="mb-4">
                                    <label for="price" class="block text-sm font-semibold text-gray-900 mb-3">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                            Prix de vente (€) *
                                        </span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">€</span>
                                        </div>
                                        <input type="number"
                                               id="price"
                                               name="price"
                                               value="{{ old('price') }}"
                                               step="0.01"
                                               min="0"
                                               required
                                               placeholder="0.00"
                                               class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('price') border-red-500 ring-red-500 @enderror">
                                    </div>
                                    @error('price')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Prix de comparaison -->
                                <div>
                                    <label for="compare_price" class="block text-sm font-semibold text-gray-900 mb-3">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            Prix de comparaison (€)
                                        </span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">€</span>
                                        </div>
                                        <input type="number"
                                               id="compare_price"
                                               name="compare_price"
                                               value="{{ old('compare_price') }}"
                                               step="0.01"
                                               min="0"
                                               placeholder="0.00"
                                               class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 @error('compare_price') border-red-500 ring-red-500 @enderror">
                                    </div>
                                    <p class="mt-2 text-xs text-gray-600 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Prix barré pour montrer une promotion
                                    </p>
                                    @error('compare_price')
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

                        <!-- Colonne droite - Stock -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-6 border border-blue-200">
                                <h3 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    Inventaire
                                </h3>

                                <!-- Stock -->
                                <div class="mb-4">
                                    <label for="stock" class="block text-sm font-semibold text-gray-900 mb-3">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            Quantité en stock *
                                        </span>
                                    </label>
                                    <input type="number"
                                           id="stock"
                                           name="stock"
                                           value="{{ old('stock', 0) }}"
                                           min="0"
                                           required
                                           placeholder="0"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('stock') border-red-500 ring-red-500 @enderror">
                                    @error('stock')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- SKU et Code-barres -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sku" class="block text-sm font-semibold text-gray-900 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                </svg>
                                                SKU
                                            </span>
                                        </label>
                                        <input type="text"
                                               id="sku"
                                               name="sku"
                                               value="{{ old('sku') }}"
                                               placeholder="Ex: IPH15PM-256"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('sku') border-red-500 ring-red-500 @enderror">
                                        @error('sku')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="barcode" class="block text-sm font-semibold text-gray-900 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                                </svg>
                                                Code-barres
                                            </span>
                                        </label>
                                        <input type="text"
                                               id="barcode"
                                               name="barcode"
                                               value="{{ old('barcode') }}"
                                               placeholder="Ex: 1234567890123"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200 @error('barcode') border-red-500 ring-red-500 @enderror">
                                        @error('barcode')
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
                </div>

                <!-- Onglet Images et médias -->
                <div x-show="activeTab === 'media'" class="p-6 space-y-6">
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg p-6 border border-purple-200">
                        <h3 class="text-lg font-semibold text-purple-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Images du produit
                        </h3>

                        <div class="space-y-4">
                            <!-- Upload d'image -->
                            <div>
                                <label for="image" class="block text-sm font-semibold text-gray-900 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        Image principale
                                    </span>
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-purple-400 transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                                <span>Télécharger une image</span>
                                                <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                                    </div>
                                </div>
                                @error('image')
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

                <!-- Onglet Options avancées -->
                <div x-show="activeTab === 'advanced'" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Colonne gauche - Options produit -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-gray-50 to-slate-50 rounded-lg p-6 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                    </svg>
                                    Options du produit
                                </h3>

                                <!-- Checkboxes -->
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="is_featured"
                                               name="is_featured"
                                               type="checkbox"
                                               value="1"
                                               {{ old('is_featured') ? 'checked' : '' }}
                                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="is_featured" class="ml-3 block text-sm font-medium text-gray-700">
                                            Produit vedette
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="is_active"
                                               name="is_active"
                                               type="checkbox"
                                               value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}
                                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="is_active" class="ml-3 block text-sm font-medium text-gray-700">
                                            Produit actif
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="is_virtual"
                                               name="is_virtual"
                                               type="checkbox"
                                               value="1"
                                               {{ old('is_virtual') ? 'checked' : '' }}
                                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="is_virtual" class="ml-3 block text-sm font-medium text-gray-700">
                                            Produit virtuel (pas de livraison)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne droite - Dimensions -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-amber-50 to-yellow-50 rounded-lg p-6 border border-amber-200">
                                <h3 class="text-lg font-semibold text-amber-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                    </svg>
                                    Dimensions et poids
                                </h3>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="weight" class="block text-sm font-medium text-gray-700 mb-2">Poids (kg)</label>
                                        <input type="number"
                                               id="weight"
                                               name="weight"
                                               value="{{ old('weight') }}"
                                               step="0.01"
                                               min="0"
                                               placeholder="0.00"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200">
                                    </div>

                                    <div>
                                        <label for="length" class="block text-sm font-medium text-gray-700 mb-2">Longueur (cm)</label>
                                        <input type="number"
                                               id="length"
                                               name="length"
                                               value="{{ old('length') }}"
                                               step="0.01"
                                               min="0"
                                               placeholder="0.00"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200">
                                    </div>

                                    <div>
                                        <label for="width" class="block text-sm font-medium text-gray-700 mb-2">Largeur (cm)</label>
                                        <input type="number"
                                               id="width"
                                               name="width"
                                               value="{{ old('width') }}"
                                               step="0.01"
                                               min="0"
                                               placeholder="0.00"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200">
                                    </div>

                                    <div>
                                        <label for="height" class="block text-sm font-medium text-gray-700 mb-2">Hauteur (cm)</label>
                                        <input type="number"
                                               id="height"
                                               name="height"
                                               value="{{ old('height') }}"
                                               step="0.01"
                                               min="0"
                                               placeholder="0.00"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boutons de soumission -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Les champs marqués d'un * sont obligatoires
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.products.index') }}"
                               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                Annuler
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 border border-transparent rounded-lg font-medium text-white hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Créer le produit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Animations pour les onglets */
[x-show] {
    transition: all 0.3s ease-in-out;
}

/* Amélioration des focus states */
input:focus, select:focus, textarea:focus {
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

/* Animation pour les boutons */
button:hover {
    transform: translateY(-1px);
}

/* Amélioration du drag & drop */
.border-dashed:hover {
    border-color: #8b5cf6;
    background-color: #faf5ff;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du drag & drop pour les images
    const dropZone = document.querySelector('.border-dashed');
    const fileInput = document.getElementById('image');

    if (dropZone && fileInput) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-purple-400', 'bg-purple-50');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-purple-400', 'bg-purple-50');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                fileInput.files = files;
            }
        }
    }
});
</script>
@endsection
