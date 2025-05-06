@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6 animate-fade-in-up font-sans">
    <h1 class="text-3xl font-bold text-pink-600 mb-6">Selamat datang di Dashboard Admin 🐾</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @php
            $cards = [
                ['title' => 'Users', 'count' => $users_count, 'id' => 'chartUsers', 'color' => 'bg-pink-100', 'text' => 'text-pink-700', 'chartColor' => '#ec4899', 'icon' => '👤'],
                ['title' => 'Doctors', 'count' => $doctors_count, 'id' => 'chartDoctors', 'color' => 'bg-purple-100', 'text' => 'text-purple-700', 'chartColor' => '#a78bfa', 'icon' => '🩺'],
                ['title' => 'Appointments', 'count' => $appointments_count, 'id' => 'chartAppointments', 'color' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'chartColor' => '#facc15', 'icon' => '📅'],
                ['title' => 'Invoices', 'count' => $invoices_count, 'id' => 'chartInvoices', 'color' => 'bg-green-100', 'text' => 'text-green-700', 'chartColor' => '#4ade80', 'icon' => '🧾'],
                ['title' => 'Pets', 'count' => $pets_count, 'id' => 'chartPets', 'color' => 'bg-blue-100', 'text' => 'text-blue-700', 'chartColor' => '#60a5fa', 'icon' => '🐶'],
                ['title' => 'Services', 'count' => $services_count, 'id' => 'chartServices', 'color' => 'bg-red-100', 'text' => 'text-red-700', 'chartColor' => '#f87171', 'icon' => '🛠️'],
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="rounded-2xl p-4 shadow-md {{ $card['color'] }} flex items-center gap-4 min-h-[100px] hover:scale-105 transition-transform duration-300">
            <div class="text-3xl">{{ $card['icon'] }}</div>
            <div class="w-16 h-16 aspect-square">
                <canvas id="{{ $card['id'] }}"></canvas>
            </div>
            <div>
                <h2 class="text-sm font-medium {{ $card['text'] }}">{{ $card['title'] }}</h2>
                <p class="text-xl font-bold">{{ $card['count'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        <!-- Bagian Latest Appointments -->
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold text-pink-600">Latest Appointments</h3>
                <a href="{{ route('admin.appointments.index') }}" class="text-sm text-pink-500 hover:underline">Lihat Semua</a>
            </div>
            <table class="w-full text-sm text-left table-auto border-collapse rounded-lg overflow-hidden">
                <thead>
                    <tr class="text-gray-600 bg-pink-100 border-b">
                        <th class="py-3 px-4 text-sm font-medium text-gray-700">🐾 Pet</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-700">🩺 Dokter</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-700">🛠️ Layanan</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-700">⏰ Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latest_appointments as $appointment)
                    <tr class="border-b hover:bg-pink-50 transition duration-200 ease-in-out">
                        <td class="py-3 px-4 text-gray-700">{{ $appointment->pet->name }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $appointment->doctor->name }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $appointment->service->service_name }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $appointment->time }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bagian Latest Invoices -->
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold text-purple-600">Latest Invoices</h3>
                <a href="{{ route('admin.invoices.index') }}" class="text-sm text-purple-500 hover:underline">Lihat Semua</a>
            </div>
            <table class="w-full text-sm text-left table-auto border-collapse rounded-lg overflow-hidden">
                <thead>
                    <tr class="text-gray-600 bg-purple-100 border-b">
                        <th class="py-3 px-4 text-sm font-medium text-gray-700">🧾 No Invoice</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-700">⏰ Waktu</th>
                        <th class="py-3 px-4 text-sm font-medium text-gray-700">🛠️ Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latest_invoices as $invoice)
                    <tr class="border-b hover:bg-purple-50 transition duration-200 ease-in-out">
                        <td class="py-3 px-4 text-gray-700">{{ $invoice->invoice_number }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $invoice->appointment->time }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $invoice->appointment->service->service_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = @json($cards);
        const chartData = @json($chartData);

        cards.forEach(({ id, title, chartColor }) => {
            const ctx = document.getElementById(id);
            if (!ctx) return;

            const chartCount = chartData[title] ?? 0;

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Total', 'Kosong'],
                    datasets: [{
                        data: [chartCount, chartCount > 0 ? chartCount * 0.25 : 1],
                        backgroundColor: [chartColor, '#f3f4f6'],
                        borderWidth: 0
                    }]
                },
                options: {
                    cutout: '70%',
                    plugins: { legend: { display: false } },
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    });
</script>
@endsection
