@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-pink-600 flex items-center gap-2">
            🐾 Manage Pets
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


    <div class="mb-4">
        <a href="{{ route('admin.pets.create') }}"
           class="inline-block bg-pink-400 hover:bg-pink-500 text-white font-semibold px-4 py-2 rounded-xl shadow transition-all duration-200">
            + Add Pet
        </a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left min-w-[600px]">
            <thead>
                <tr class="bg-yellow-100 text-pink-600">
                    <th class="p-4">Name</th>
                    <th class="p-4">Species</th>
                    <th class="p-4">Breed</th>
                    <th class="p-4">Age</th>
                    <th class="p-4">Gender</th>
                    <th class="p-4">Owner</th>
                    <th class="p-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pets as $pet)
                    <tr class="border-t hover:bg-yellow-50 transition">
                        <td class="p-4">{{ $pet->name }}</td>
                        <td class="p-4">{{ $pet->species }}</td>
                        <td class="p-4">{{ $pet->breed }}</td>
                        <td class="p-4">{{ floor($pet->age / 12) }} yrs {{ $pet->age % 12 }} mos</td>
                        <td class="p-4 capitalize">{{ $pet->gender }}</td>
                        <td class="p-4">{{ $pet->user->name ?? 'N/A' }}</td>
                        <td class="p-4 text-center space-x-2">
                            <a href="{{ route('admin.pets.edit', $pet) }}"
                               class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-xl text-sm transition-all shadow">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.pets.destroy', $pet) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this pet?')">
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
                        <td colspan="7" class="p-4 text-center text-gray-400">No pets found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $pets->links() }}
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
