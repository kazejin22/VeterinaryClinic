@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-yellow-50 py-12 px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8">
            <h2 class="text-3xl font-bold text-yellow-500 mb-6 flex items-center gap-2">
                <!-- Icon SVG Sad Face -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 21c5.523 0 10-4.477 10-10S17.523 1 12 1 2 5.477 2 12s4.477 10 10 10zM9 15c0 1.654 1.346 3 3 3s3-1.346 3-3H9zm3-4c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"/>
                </svg>
                Payment Feature Unavailable
            </h2>

            <p class="text-gray-700 text-xl mb-6 text-center">
                The payment feature is not available at the moment because I am working towards a submission deadline. 😔 
                However, I will be adding this feature in the future. Stay tuned!
            </p>

            <div class="flex justify-center gap-6 mt-8">
                <a href="{{ route('admin.dashboard') }}" 
                   class="bg-pink-300 text-white px-6 py-2 rounded-lg shadow-md hover:bg-pink-400 hover:scale-105 transition-all duration-300 ease-in-out transform">
                   Back to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
