@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-yellow-50 py-12 px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8">
            <h2 class="text-3xl font-bold text-yellow-500 mb-6 flex items-center gap-2">
                <!-- Icon SVG Medical Heart -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12.1 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 
                             4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 
                             2.09C13.09 3.81 14.76 3 16.5 3 
                             19.58 3 22 5.42 22 8.5c0 3.78-3.4 
                             6.86-8.55 11.54l-1.35 1.31z"/>
                </svg>
                Edit Service: {{ $service->service_name }}
            </h2>

            <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Service Name</label>
                        <input type="text" name="service_name" value="{{ old('service_name', $service->service_name) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Description</label>
                        <textarea name="description" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" rows="3">{{ old('description', $service->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Cost</label>
                        <input type="number" name="cost" value="{{ old('cost', $service->cost) }}" step="0.01" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                    </div>
                </div>

                <div class="flex justify-center gap-6 mt-8">
                    <button type="submit" class="bg-yellow-400 text-white px-6 py-2 rounded-lg shadow-md hover:bg-yellow-500 hover:scale-105 transition-all duration-300 ease-in-out transform">
                        Update Service
                    </button>

                    <a href="{{ route('admin.services.index') }}" class="bg-pink-300 text-white px-6 py-2 rounded-lg shadow-md hover:bg-pink-400 hover:scale-105 transition-all duration-300 ease-in-out transform">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
