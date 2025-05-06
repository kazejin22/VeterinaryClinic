@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-pink-600 flex items-center gap-2">
            💸 Manage Invoices
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
        <form method="GET" action="{{ route('admin.invoices.index') }}" class="flex items-center gap-2">
            <label for="doctor_id" class="text-sm font-medium text-gray-700">Filter by Doctor:</label>
            <select name="doctor_name" id="doctor_name"
    onchange="this.form.submit()"
    class="px-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-pink-400 focus:border-pink-400">
    <option value="">All Doctors</option>
    @foreach ($doctors as $doctor)
        <option value="{{ $doctor->name }}" {{ request('doctor_name') == $doctor->name ? 'selected' : '' }}>
            {{ $doctor->name }}
        </option>
    @endforeach
</select>

        </form>          
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left min-w-[600px]">
            <thead>
                <tr class="bg-yellow-100 text-pink-600">
                    <th class="p-4">Invoice ID</th>
                    <th class="p-4">Owner</th>
                    <th class="p-4">Invoice Number</th>
                    <th class="p-4">Pet Name</th>
                    <th class="p-4">Doctor</th>
                    <th class="p-4">Service</th>
                    <th class="p-4">Appointment Date</th>
                    <th class="p-4">Total Cost</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($invoices as $invoice)
                    <tr class="border-t hover:bg-yellow-50 transition">
                        <td class="p-4">{{ $invoice->id }}</td>
                        <td class="p-4">{{ $invoice->appointment->pet->user->name }}</td>
                        <td class="p-4">{{ $invoice->invoice_number }}</td>
                        <td class="p-4">{{ $invoice->appointment->pet->name }}</td>
                        <td class="p-4">{{ $invoice->appointment->doctor->name }}</td>
                        <td class="p-4">{{ $invoice->appointment->service->service_name }}</td>
                        <td class="p-4">{{ \Carbon\Carbon::parse($invoice->appointment->time)->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-2 text-green-600 font-semibold">$ {{ number_format($invoice->cost, 2, '.', ',') }}</td>
                        <td class="px-4 py-2"><a href="{{ route('admin.invoices.show', $invoice->id) }}" class="text-blue-500 hover:underline">View</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="p-4 text-center text-gray-400">No invoices found.</td>
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
