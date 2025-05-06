@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-pink-600 flex items-center gap-2">
            🩺 Manage Doctors
        </h1>
    </div>

    @if(session('success'))
        @php
            $color = session('color') ?? 'green';
            $bgColors = [
                'green' => 'bg-green-100 text-green-800',
                'yellow' => 'bg-yellow-100 text-yellow-800',
                'red' => 'bg-red-100 text-red-800'
            ];
        @endphp

        <div id="success-alert"
            class="{{ $bgColors[$color] ?? $bgColors['green'] }} p-4 rounded mb-4 shadow-md text-sm font-medium transform animate__animated animate__bounceIn">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.classList.remove('animate__bounceIn');
                    alert.classList.add('animate__fadeOutUp');
                    setTimeout(() => alert.remove(), 700);
                }
            }, 3000);
        </script>
    @endif

    <div class="mb-4 flex justify-between items-center flex-wrap gap-4">
        <a href="{{ route('admin.doctors.create') }}"
           class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-4 py-2 rounded-xl shadow transition-all duration-200">
            + Add Doctor
        </a>

        <form method="GET" action="{{ route('admin.doctors.index') }}" class="flex items-center gap-2">
            <label for="specialization" class="text-sm font-medium text-gray-700">Filter by:</label>
            <select name="specialization" id="specialization"
                onchange="this.form.submit()"
                class="px-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-pink-400 focus:border-pink-400">
                <option value="">All Specializations</option>
                @foreach($specializations as $spec)
                    <option value="{{ $spec }}" @if(request('specialization') == $spec) selected @endif>{{ $spec }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left min-w-[600px]">
            <thead>
                <tr class="bg-yellow-100 text-pink-600">
                    <th class="p-4">Name</th>
                    <th class="p-4">Specialization</th>
                    <th class="p-4">Phone</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">License</th>
                    <th class="p-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($doctors as $doctor)
                    <tr class="border-t hover:bg-yellow-50 transition">
                        <td class="p-4">{{ $doctor->name }}</td>
                        <td class="p-4">{{ $doctor->specialization }}</td>
                        <td class="p-4">{{ $doctor->phone_number }}</td>
                        <td class="p-4">{{ $doctor->email }}</td>
                        <td class="p-4">{{ $doctor->license_number }}</td>
                        <td class="p-4 text-center space-x-2">
                            <a href="{{ route('admin.doctors.edit', $doctor->doctor_id) }}"
                               class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-xl text-sm transition-all shadow">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.doctors.destroy', $doctor->doctor_id) }}" method="POST"
                                  class="inline-block delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-xl text-sm transition-all shadow delete-button">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-400">No doctors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f87171',
                    cancelButtonColor: '#facc15',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        popup: 'animate__animated animate__bounceIn',
                        confirmButton: 'bg-red-400 text-white rounded px-4 py-2 shadow hover:bg-red-500',
                        cancelButton: 'bg-yellow-300 text-white rounded px-4 py-2 shadow hover:bg-yellow-400'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush