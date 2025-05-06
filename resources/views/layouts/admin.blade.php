<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aespaw Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>
    <style>
        /* Custom Animations */
        @keyframes slideInSidebar {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(0); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Sidebar slide in */
        .sidebar {
            animation: slideInSidebar 0.5s ease-out;
        }

        /* Content fade in */
        .content {
            animation: fadeIn 0.6s ease-in-out;
        }

        /* Hover effect for sidebar links */
        .sidebar-link {
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .sidebar-link:hover {
            color: #ff61a6; /* Soft pink on hover */
            transform: scale(1.05);
        }

        /* Hover effects on the cards */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Main container with sidebar and content -->
    <div class="flex min-h-screen">

        <!-- Sidebar with white background and shadows -->
        <div class="w-64 bg-white shadow-lg p-4 sidebar">
            <div class="mb-6 text-2xl font-bold text-gray-800 flex items-center gap-2">
                <img src="https://img.icons8.com/ios/50/000000/dog.png" alt="Aespaw Icon" class="w-8 h-8" />
                <span>Aespaw</span>
            </div>
            <nav>
                <ul>
                    <li class="mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link text-lg">Dashboard</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.pets.index') }}" class="sidebar-link">Pets</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.doctors.index') }}" class="sidebar-link">Doctors</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.appointments.index') }}" class="sidebar-link">Appointments</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.services.index') }}" class="sidebar-link">Services</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.payments.index') }}" class="sidebar-link">Payments<br>*Upcoming Features*</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.invoices.index') }}" class="sidebar-link">Invoices</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main content area (right of the sidebar) -->
        <div class="flex-1 p-6 bg-white content">
            @yield('content')
        </div>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
    @stack('scripts')
</body>
</html>
