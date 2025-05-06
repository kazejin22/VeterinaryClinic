<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #C9E4DE;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @keyframes bounceIn {
            0%, 20%, 40%, 60%, 80%, 100% {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
            }
            0% {
                opacity: 0;
                transform: scale3d(.3, .3, .3);
            }
            20% {
                transform: scale3d(1.1, 1.1, 1.1);
            }
            40% {
                transform: scale3d(.9, .9, .9);
            }
            60% {
                opacity: 1;
                transform: scale3d(1.03, 1.03, 1.03);
            }
            80% {
                transform: scale3d(.97, .97, .97);
            }
            100% {
                transform: scale3d(1, 1, 1);
            }
        }

        .card-bounce {
            animation: bounceIn 1s;
        }

        @keyframes pulseBadge {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.9;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
.pulse-badge {
    animation: pulseBadge 2s infinite;
}
    </style>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen px-4 py-8">
        @if(session('invoice'))
            @php
                $invoice = session('invoice');
            @endphp

            <div class="bg-white p-8 rounded-3xl shadow-2xl card-bounce max-w-2xl w-full text-gray-800">
                <div class="flex items-center justify-center mb-6">
                    <!-- SVG ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4m5-2a9 9 0 11-18 0a9 9 0 0118 0z" />
                    </svg>
                </div>

                <h1 class="text-3xl font-bold text-center text-green-700 mb-2">Thank You For Your Appointment!</h1>
                <p class="text-center text-gray-600 mb-6">Here's your invoice detail 🐾<br> Show this to the reseptionist</p>

                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Invoice Number:</span>
                        <span class="font-semibold">{{ $invoice->invoice_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Pet Name:</span>
                        <span>{{ $invoice->appointment->pet->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Doctor:</span>
                        <span>{{ $invoice->appointment->doctor->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Services:</span>
                        <span>{{ $invoice->appointment->service->service_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Appointment Date:</span>
                        <span>{{ \Carbon\Carbon::parse($invoice->appointment->time)->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Total Cost:</span>
                        <span class="text-xl font-bold text-green-600">$ {{ number_format($invoice->cost, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-center mt-4">
    <span class="inline-block px-4 py-1 text-sm rounded-full bg-green-100 text-green-700 font-medium animate-bounce pulse-badge">
        Scheduled
    </span>
</div>


                <div class="mt-8 text-center">
                    <a href="{{ route('dashboard') }}"
                       class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow transition duration-200">
                        Go To Home
                    </a>
                </div>
            </div>
        @else
            <p class="text-red-600 font-semibold text-lg text-center">Invoice tidak ditemukan.</p>
        @endif
    </div>
</body>
</html>
