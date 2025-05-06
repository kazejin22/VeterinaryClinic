@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-yellow-50 py-12 px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-8">
            <h2 class="text-3xl font-bold text-yellow-500 mb-6 flex items-center gap-2">
                <!-- Icon SVG Calendar Check / Appointment -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 
                             2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 
                             2-2V6c0-1.1-.9-2-2-2zm0 
                             16H5V9h14v11zm0-13H5V6h14v1z"/>
                </svg>
                Edit Appointment
            </h2>

            <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Pet</label>
                        <select name="pet_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                            @foreach ($pets as $pet)
                                <option value="{{ $pet->pet_id }}" {{ $pet->pet_id == $appointment->pet_id ? 'selected' : '' }}>{{ $pet->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Doctor</label>
                        <select name="doctor_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->doctor_id }}" {{ $doctor->doctor_id == $appointment->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Service</label>
                        <select name="service_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ $service->id == $appointment->service_id ? 'selected' : '' }}>{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Time</label>
                        <input type="datetime-local" name="time" value="{{ date('Y-m-d\TH:i', strtotime($appointment->time)) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                            <option value="scheduled" {{ $appointment->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-center gap-6 mt-8">
                    <button type="submit"
                        class="bg-yellow-400 text-white px-6 py-2 rounded-lg shadow-md hover:bg-yellow-500 hover:scale-105 transition-all duration-300 ease-in-out transform">
                        Update Appointment
                    </button>

                    <a href="{{ route('admin.appointments.index') }}"
                        class="bg-pink-300 text-white px-6 py-2 rounded-lg shadow-md hover:bg-pink-400 hover:scale-105 transition-all duration-300 ease-in-out transform">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
