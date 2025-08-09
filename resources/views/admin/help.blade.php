@extends('layouts.admin')

@section('title', 'Guide d\'utilisation')

@section('content')
<div class="container mx-auto px-4 py-6" x-data="{ activeSection: 'connexion' }">
    <!-- Header amélioré -->
    <div class="mb-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full mb-4">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-2">
            Guide d'Administration
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Maîtrisez votre panneau d'administration e-commerce avec ce guide complet et interactif
        </p>
        <div class="mt-4 flex items-center justify-center space-x-4 text-sm text-gray-500">
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Système sécurisé
            </div>
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Interface moderne
            </div>
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                </svg>
                Gestion complète
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Navigation améliorée -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 sticky top-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Navigation rapide
                </h3>
                <nav class="space-y-1">
                    <a href="#connexion"
                       @click="activeSection = 'connexion'"
                       :class="activeSection === 'connexion' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50'"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m0 0a2 2 0 012 2m-2-2a2 2 0 00-2 2m2-2a2 2 0 00-2-2M9 5a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h2z"></path>
                        </svg>
                        Connexion
                    </a>
                    <a href="#produits"
                       @click="activeSection = 'produits'"
                       :class="activeSection === 'produits' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50'"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Produits
                    </a>
                    <a href="#categories"
                       @click="activeSection = 'categories'"
                       :class="activeSection === 'categories' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50'"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5"></path>
                        </svg>
                        Catégories
                    </a>
                    <a href="#utilisateurs"
                       @click="activeSection = 'utilisateurs'"
                       :class="activeSection === 'utilisateurs' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50'"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        Utilisateurs
                    </a>
                    <a href="#chat"
                       @click="activeSection = 'chat'"
                       :class="activeSection === 'chat' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50'"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Chat
                    </a>
                    <a href="#securite"
                       @click="activeSection = 'securite'"
                       :class="activeSection === 'securite' ? 'bg-indigo-50 text-indigo-700 border-indigo-200' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-50'"
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Sécurité
                    </a>
                </nav>

                <!-- Statistiques rapides -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Statistiques rapides</h4>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Produits</span>
                            <span class="font-medium text-gray-900">{{ \App\Models\Product::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Catégories</span>
                            <span class="font-medium text-gray-900">{{ \App\Models\Category::count() }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Utilisateurs</span>
                            <span class="font-medium text-gray-900">{{ \App\Models\User::count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Connexion -->
            <div id="connexion" class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow-lg border border-blue-100 p-8 transform transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m0 0a2 2 0 012 2m-2-2a2 2 0 00-2 2m2-2a2 2 0 00-2-2M9 5a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Connexion Administrateur</h2>
                        <p class="text-gray-600">Accédez à votre panneau d'administration</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg border border-blue-200 p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900">Identifiants par défaut</h4>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm font-medium text-gray-600">Email</span>
                                <code class="text-sm font-mono bg-white px-2 py-1 rounded border">admin@example.com</code>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm font-medium text-gray-600">Mot de passe</span>
                                <code class="text-sm font-mono bg-white px-2 py-1 rounded border">password123</code>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg border border-green-200 p-6 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900">Étapes de connexion</h4>
                        </div>
                        <ol class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-5 h-5 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs font-bold mr-2 mt-0.5">1</span>
                                Allez sur <code class="bg-gray-100 px-1 rounded">/login</code>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-5 h-5 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs font-bold mr-2 mt-0.5">2</span>
                                Entrez les identifiants admin
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-5 h-5 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs font-bold mr-2 mt-0.5">3</span>
                                Cliquez sur "Administration"
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-yellow-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-yellow-800 mb-1">⚠️ Sécurité importante</p>
                            <p class="text-sm text-yellow-700">
                                Changez le mot de passe par défaut dès votre première connexion. Utilisez un mot de passe fort avec au moins 12 caractères.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gestion des produits -->
            <div id="produits" class="bg-gradient-to-br from-white to-green-50 rounded-xl shadow-lg border border-green-100 p-8 transform transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Gestion des Produits</h2>
                        <p class="text-gray-600">Contrôlez entièrement votre catalogue</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Fonctionnalités principales
                        </h4>
                        <div class="space-y-3">
                            <div class="flex items-start p-3 bg-white rounded-lg border border-green-200 shadow-sm">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-900">Créer des produits</h5>
                                    <p class="text-sm text-gray-600">Ajoutez de nouveaux produits avec images, prix, stock</p>
                                </div>
                            </div>

                            <div class="flex items-start p-3 bg-white rounded-lg border border-green-200 shadow-sm">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-900">Modifier & Supprimer</h5>
                                    <p class="text-sm text-gray-600">Mettez à jour ou retirez les produits obsolètes</p>
                                </div>
                            </div>

                            <div class="flex items-start p-3 bg-white rounded-lg border border-green-200 shadow-sm">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-900">Recherche & Filtres</h5>
                                    <p class="text-sm text-gray-600">Trouvez rapidement vos produits</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            Conseils d'optimisation
                        </h4>
                        <div class="bg-white rounded-lg border border-yellow-200 p-4 shadow-sm">
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Images de qualité (800x600px recommandé)
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Descriptions détaillées et attractives
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                    Surveillez les alertes de stock faible
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                    Utilisez les produits "vedettes" pour la promotion
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg p-4 border border-indigo-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span class="font-medium text-indigo-900">Accès rapide :</span>
                        <a href="{{ route('admin.products.index') }}" class="ml-2 text-indigo-600 hover:text-indigo-800 font-medium underline">
                            Gérer les produits →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gestion des catégories -->
            <div id="categories" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">🏷️ Gestion des Catégories</h2>
                <div class="space-y-4">
                    <p class="text-gray-700">
                        Les catégories permettent d'organiser vos produits et d'améliorer l'expérience utilisateur.
                    </p>
                    <h4 class="font-medium text-gray-900">Actions possibles :</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Créer de nouvelles catégories</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Modifier les catégories existantes</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Ajouter des images aux catégories</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Activer/désactiver des catégories</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Gestion des utilisateurs -->
            <div id="utilisateurs" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">👥 Gestion des Utilisateurs</h2>
                <div class="space-y-4">
                    <p class="text-gray-700">
                        Surveillez et gérez tous les utilisateurs de votre plateforme.
                    </p>
                    <h4 class="font-medium text-gray-900">Informations disponibles :</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-blue-500 mr-2">ℹ️</span>
                            <span>Liste complète des utilisateurs</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-500 mr-2">ℹ️</span>
                            <span>Rôles et permissions</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-500 mr-2">ℹ️</span>
                            <span>Dates d'inscription</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-500 mr-2">ℹ️</span>
                            <span>Statut de vérification email</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Système de chat -->
            <div id="chat" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">💬 Système de Chat</h2>
                <div class="space-y-4">
                    <p class="text-gray-700">
                        Communiquez directement avec vos clients grâce au système de chat intégré.
                    </p>
                    <h4 class="font-medium text-gray-900">Fonctionnalités :</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Chat en temps réel avec les clients</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Historique des conversations</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Notifications de nouveaux messages</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Interface intuitive et responsive</span>
                        </li>
                    </ul>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <p class="text-sm text-blue-800">
                            <strong>💡 Astuce :</strong> Utilisez le chat pour fournir un support client de qualité et améliorer la satisfaction de vos clients.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sécurité -->
            <div id="securite" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">🔒 Sécurité</h2>
                <div class="space-y-4">
                    <h4 class="font-medium text-gray-900">Mesures de sécurité en place :</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Authentification obligatoire pour l'administration</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Système de rôles et permissions</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Protection CSRF sur tous les formulaires</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Validation des données côté serveur</span>
                        </li>
                    </ul>
                    
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <h5 class="font-medium text-red-900 mb-2">⚠️ Recommandations de sécurité :</h5>
                        <ul class="text-sm text-red-800 space-y-1">
                            <li>• Changez le mot de passe administrateur par défaut</li>
                            <li>• Utilisez un mot de passe fort et unique</li>
                            <li>• Ne partagez jamais vos identifiants</li>
                            <li>• Déconnectez-vous après chaque session</li>
                            <li>• Surveillez régulièrement les activités suspectes</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Section de raccourcis rapides -->
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-xl shadow-lg p-8 text-white">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold mb-2">🚀 Raccourcis Rapides</h2>
                    <p class="text-gray-300">Accédez rapidement aux fonctionnalités principales</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.dashboard') }}"
                       class="bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg p-4 text-center transition-all duration-200 transform hover:scale-105">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-white mb-1">Dashboard</h3>
                        <p class="text-xs text-gray-300">Vue d'ensemble</p>
                    </a>

                    <a href="{{ route('admin.products.index') }}"
                       class="bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg p-4 text-center transition-all duration-200 transform hover:scale-105">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-white mb-1">Produits</h3>
                        <p class="text-xs text-gray-300">Gérer le catalogue</p>
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg p-4 text-center transition-all duration-200 transform hover:scale-105">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-white mb-1">Utilisateurs</h3>
                        <p class="text-xs text-gray-300">Gérer les comptes</p>
                    </a>

                    <a href="{{ route('chatify') }}"
                       class="bg-white bg-opacity-10 hover:bg-opacity-20 rounded-lg p-4 text-center transition-all duration-200 transform hover:scale-105">
                        <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-white mb-1">Chat</h3>
                        <p class="text-xs text-gray-300">Support client</p>
                    </a>
                </div>

                <div class="mt-8 text-center">
                    <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-10 rounded-lg">
                        <svg class="w-4 h-4 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-gray-300">Système opérationnel - Prêt à l'utilisation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Smooth scrolling pour les ancres */
html {
    scroll-behavior: smooth;
}

/* Animation pour les sections */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}
</style>

<script>
// Script pour la navigation active
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling pour les liens d'ancrage
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animation d'apparition des sections
    const sections = document.querySelectorAll('[id]');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, { threshold: 0.1 });

    sections.forEach(section => {
        observer.observe(section);
    });
});
</script>
@endsection
