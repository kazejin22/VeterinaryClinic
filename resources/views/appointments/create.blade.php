@extends('layouts.app')
<link rel="stylesheet" href="/css/appointment.css">

    <style>

</style>


@section('content')
<div class="add-pet-section">
    <p>Doesn't have any pets? 
        <a href="{{ route('pets.create') }}" class="add-pet-btn">Click here to add pet</a>
    </p>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-wrapper">
    <div class="form-container">
        <h2>Form Appointment</h2>
        <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- PET SELECT --}}
        <div class="form-group">
            <label class="block font-medium">Pet</label>
            <select name="pet_id" class="w-full border p-2 rounded" required>
                <option value="">-- Select Pet --</option>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->pet_id }}" {{ old('pet_id') == $pet->pet_id ? 'selected' : '' }}>
                        {{ $pet->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- DOCTOR SELECT --}}
        <div class="form-group">
            <label class="block font-medium">Doctor</label>
            <select name="doctor_id" class="w-full border p-2 rounded" required>
                <option value="">-- Select Doctor --</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->doctor_id }}" {{ old('doctor_id') == $doctor->doctor_id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- SERVICE SELECT --}}
        <div class="form-group">
            <label class="block font-medium">Service</label>
            <select name="service_id" class="w-full border p-2 rounded" required>
                <option value="">-- Select Service --</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->service_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- TIME --}}
        <div class="form-group">
            <label class="block font-medium">Appointment Time</label>
            <input type="datetime-local" name="time" class="w-full border p-2 rounded" value="{{ old('time') }}" required>
        </div>

        {{-- SUBMIT --}}
        <div class="form-group">
            <button type="submit" class="btn-primary">Book Appointment</button>
        </div>
    </form>
    </div>
</div>
@endsection