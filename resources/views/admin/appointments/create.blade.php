@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-pink-50 py-12 px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8">
            <h2 class="text-3xl font-bold text-pink-500 mb-6 flex items-center gap-2">
                <svg class="w-7 h-7 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                Create New Appointment
            </h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.appointments.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- PET SELECT --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Pet</label>
                        <select name="pet_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                            <option value="">-- Select Pet --</option>
                            @foreach ($pets as $pet)
                                <option value="{{ $pet->pet_id }}" {{ old('pet_id') == $pet->pet_id ? 'selected' : '' }}>
                                    {{ $pet->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- DOCTOR SELECT --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Doctor</label>
                        <select name="doctor_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                            <option value="">-- Select Doctor --</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->doctor_id }}" {{ old('doctor_id') == $doctor->doctor_id ? 'selected' : '' }}>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- SERVICE SELECT --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Service</label>
                        <select name="service_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                            <option value="">-- Select Service --</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->service_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- TIME --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Appointment Time</label>
                        <input type="datetime-local" name="time" value="{{ old('time') }}"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                    </div>

                    {{-- STATUS --}}
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-300" required>
                            <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-center gap-6 mt-8">
                    <button type="submit"
                        class="bg-pink-400 text-white px-6 py-2 rounded-lg shadow-md hover:bg-pink-500 hover:scale-105 transform transition-all duration-300 ease-in-out">
                        Save Appointment
                    </button>

                    <a href="{{ route('admin.appointments.index') }}"
                        class="bg-yellow-300 text-white px-6 py-2 rounded-lg shadow-md hover:bg-yellow-400 hover:scale-105 transform transition-all duration-300 ease-in-out">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
