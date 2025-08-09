<x-guest-layout>
    <!-- Header -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Connexion</h2>
        <p class="text-sm text-gray-600">
            Connectez-vous à votre compte
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Votre mot de passe" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <!-- Comptes de démonstration -->
        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <h4 class="text-sm font-medium text-blue-900 mb-3">Comptes de démonstration :</h4>
            <div class="space-y-2">
                <div class="flex items-center justify-between p-2 bg-white rounded border">
                    <div>
                        <p class="text-sm font-medium text-gray-900">👑 Administrateur</p>
                        <p class="text-xs text-gray-600">admin@example.com / password123</p>
                    </div>
                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded">Admin</span>
                </div>
                <div class="flex items-center justify-between p-2 bg-white rounded border">
                    <div>
                        <p class="text-sm font-medium text-gray-900">👤 Client</p>
                        <p class="text-xs text-gray-600">Créez votre compte ou utilisez un compte existant</p>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded">Customer</span>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Lien vers l'inscription -->
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                Créer un compte client
            </a>
        </p>
    </div>
</x-guest-layout>
