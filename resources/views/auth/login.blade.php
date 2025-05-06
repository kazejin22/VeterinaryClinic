<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-md">
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-6">Welcome Back 🐾</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-700" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg p-3 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-700" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-lg p-3 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-4 bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded-lg text-white">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Don't have an account?</p>
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">Register here</a>
            </div>
        </div>
    </div>
</x-guest-layout>
