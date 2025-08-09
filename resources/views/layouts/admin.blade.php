<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Administration') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Admin Custom CSS -->
    <link href="{{ asset('css/admin-custom.css') }}" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-100"
      x-data="{ sidebarOpen: false }"
      @close-sidebar.window="sidebarOpen = false"
      @keydown.escape.window="sidebarOpen = false">
    <div class="min-h-screen flex">
        <!-- Overlay pour mobile -->
        <div x-show="sidebarOpen"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="sidebar-overlay fixed inset-0 z-40 bg-gray-600 bg-opacity-50 lg:hidden"></div>

        <!-- Sidebar -->
        <div class="sidebar fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0"
             :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"
             @click.away="sidebarOpen = false"
            
            <!-- Logo -->
            <div class="sidebar-header flex items-center justify-between h-16 px-4">
                <h1 class="text-xl font-bold text-white">Admin Panel</h1>
                <!-- Bouton fermer pour mobile -->
                <button @click="sidebarOpen = false"
                        class="close-button lg:hidden p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="sidebar-nav mt-8 overflow-y-auto flex-1">
                <div class="px-4 space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-item flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'nav-item-active bg-gray-700 text-white' : '' }}">
                        <svg class="nav-icon w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        Dashboard
                    </a>

                    <!-- Produits -->
                    <a href="{{ route('admin.products.index') }}"
                       class="nav-item flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.products.*') ? 'nav-item-active bg-gray-700 text-white' : '' }}">
                        <svg class="nav-icon w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Produits
                    </a>

                    <!-- Catégories -->
                    <a href="{{ route('admin.categories.index') }}" 
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-700 text-white' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5"></path>
                        </svg>
                        Catégories
                    </a>

                    <!-- Commandes -->
                    <a href="{{ route('admin.orders.index') }}" 
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.orders.*') ? 'bg-gray-700 text-white' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Commandes
                    </a>

                    <!-- Utilisateurs -->
                    <a href="{{ route('admin.users.index') }}" 
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700 text-white' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        Utilisateurs
                    </a>

                    <!-- Chat -->
                    <a href="{{ route('chatify') }}" 
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Chat avec Clients
                    </a>

                    <!-- Rapports -->
                    <a href="{{ route('admin.reports.index') }}"
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.reports.*') ? 'bg-gray-700 text-white' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Rapports
                    </a>

                    <!-- Aide -->
                    <a href="{{ route('admin.help') }}"
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.help') ? 'bg-gray-700 text-white' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Aide
                    </a>
                </div>

                <!-- Divider -->
                <div class="my-6 border-t border-gray-700"></div>

                <!-- User Menu -->
                <div class="px-4">
                    <div class="flex items-center px-4 py-3 text-sm font-medium text-gray-300">
                        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center mr-3">
                            <span class="text-xs font-bold text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-white">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-400">Administrateur</div>
                        </div>
                    </div>
                    
                    <div class="mt-2 space-y-1">
                        <a href="{{ route('profile.edit') }}" 
                           class="flex items-center px-4 py-2 text-sm text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profil
                        </a>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="w-full flex items-center px-4 py-2 text-sm text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-0">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = !sidebarOpen"
                            class="hamburger-button lg:hidden relative p-3 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <!-- Indicateur de menu -->
                        <span class="menu-indicator absolute -top-1 -right-1 w-3 h-3 bg-indigo-500 rounded-full"></span>
                        <span class="sr-only">Ouvrir le menu</span>
                    </button>

                    <!-- Page Title -->
                    <div class="flex-1">
                        <h1 class="text-2xl font-semibold text-gray-900">@yield('title', 'Administration')</h1>
                    </div>

                    <!-- Right side -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="p-2 text-gray-400 hover:text-gray-500 relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.5 3.5L6.5 7.5 4 5l6.5-6.5zM13.5 3.5L17.5 7.5 20 5l-6.5-6.5z"></path>
                            </svg>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                        </button>

                        <!-- Quick Actions -->
                        <a href="{{ route('home') }}" 
                           class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                            Voir le site
                        </a>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mx-6 mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mx-6 mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mx-6 mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile sidebar overlay -->
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
         @click="sidebarOpen = false"></div>

    <!-- Toast de notification pour le guide -->
    <div id="sidebar-guide-toast" class="toast lg:hidden">
        <button class="toast-close" onclick="closeToast()">&times;</button>
        <div class="flex items-start">
            <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h4 class="font-semibold text-sm mb-1">Menu Navigation</h4>
                <p class="text-xs opacity-90">Cliquez sur le bouton ☰ en haut à gauche pour ouvrir/fermer le menu de navigation.</p>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour fermer le toast
        function closeToast() {
            const toast = document.getElementById('sidebar-guide-toast');
            if (toast) {
                toast.classList.remove('show');
                localStorage.setItem('sidebar-guide-shown', 'true');
            }
        }

        // Amélioration de l'expérience utilisateur de la sidebar
        document.addEventListener('DOMContentLoaded', function() {
            // Afficher le toast de guide si c'est la première visite
            const guideShown = localStorage.getItem('sidebar-guide-shown');
            const toast = document.getElementById('sidebar-guide-toast');

            if (!guideShown && toast && window.innerWidth < 1024) {
                setTimeout(() => {
                    toast.classList.add('show');
                    // Auto-fermer après 5 secondes
                    setTimeout(() => {
                        closeToast();
                    }, 5000);
                }, 1000);
            }
            // Fermer la sidebar avec la touche Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    // Déclencher l'événement de fermeture
                    const event = new CustomEvent('close-sidebar');
                    document.dispatchEvent(event);
                }
            });

            // Fermer la sidebar automatiquement après clic sur un lien (mobile uniquement)
            const navLinks = document.querySelectorAll('.nav-item');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        // Petit délai pour permettre la navigation
                        setTimeout(() => {
                            const event = new CustomEvent('close-sidebar');
                            document.dispatchEvent(event);
                        }, 100);
                    }
                });
            });

            // Gérer le redimensionnement de la fenêtre
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (window.innerWidth >= 1024) {
                        const event = new CustomEvent('close-sidebar');
                        document.dispatchEvent(event);
                    }
                }, 250);
            });

            // Animation du bouton hamburger
            const hamburgerButton = document.querySelector('.hamburger-button');
            if (hamburgerButton) {
                hamburgerButton.addEventListener('click', function() {
                    this.classList.add('animate-pulse');
                    setTimeout(() => {
                        this.classList.remove('animate-pulse');
                    }, 200);
                });
            }

            // Améliorer l'accessibilité
            const sidebar = document.querySelector('.sidebar');
            if (sidebar) {
                sidebar.setAttribute('role', 'navigation');
                sidebar.setAttribute('aria-label', 'Menu principal');
            }

            // Ajouter des tooltips aux éléments de navigation
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                const text = item.textContent.trim();
                item.setAttribute('title', text);
            });
        });

        // Fonction pour Alpine.js - fermer la sidebar
        document.addEventListener('close-sidebar', function() {
            // Cette fonction sera appelée par Alpine.js si nécessaire
            const sidebarData = document.querySelector('[x-data]');
            if (sidebarData && sidebarData._x_dataStack && sidebarData._x_dataStack[0]) {
                sidebarData._x_dataStack[0].sidebarOpen = false;
            }
        });
    </script>
</body>
</html>
