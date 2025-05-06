@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-pink-50 py-12 px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8">
            <h2 class="text-3xl font-bold text-pink-500 mb-6">Add New Doctor</h2>

            <form action="{{ route('admin.doctors.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Name</label>
                        <input type="text" name="name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Specialization</label>
                        <input type="text" name="specialization" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                        <input type="text" name="phone_number" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-semibold mb-2">License Number</label>
                        <input type="text" name="license_number" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                    </div>
                </div>

                <div class="flex justify-center gap-6 mt-8">
                    <button type="submit"
                        class="bg-pink-400 text-white px-6 py-2 rounded-lg shadow-md hover:bg-pink-500 hover:scale-105 transform transition-all duration-300 ease-in-out">
                        Save Doctor
                    </button>

                    <a href="{{ route('admin.doctors.index') }}"
                        class="bg-yellow-300 text-white px-6 py-2 rounded-lg shadow-md hover:bg-yellow-400 hover:scale-105 transform transition-all duration-300 ease-in-out">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
