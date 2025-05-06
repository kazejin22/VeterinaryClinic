<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-md">
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-6">Create an Account 🐾</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Name')" class="text-sm text-black-700" />
                    <x-text-input id="name" class="block mt-1 w-full rounded-lg p-3 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="text-sm text-black-700" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg p-3 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" class="text-sm text-black-700" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-lg p-3 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm text-gray-700" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-lg p-3 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
                </div>

                <div class="flex items-center justify-between">
                    <x-primary-button class="ml-4 bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded-lg text-white">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Already have an account?</p>
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">Login here</a>
            </div>
        </div>
    </div>
</x-guest-layout>
