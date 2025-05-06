<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Petshop</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="nav-container">
                <a href="{{ route('dashboard') }}" class="logo"><img src="/icons/kumelll/notxt.png"><span class="logo-txt">  AESPAW</span></a>
                <ul class="nav-links">
    <li><a href="{{ route('dashboard') }}">Home</a></li>
    <li><a href="{{ route('service') }}">Service</a></li> <!-- Pastikan ini pakai route('service') -->
    <li><a href="{{ route('appointments.create') }}">Appointments</a></li>
    <li><a href="{{ route('about') }}">About Us</a></li>
</ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-content">
            <!-- Contact Info Section -->
            <div class="contact-info">
                <p><strong>Contact Us:</strong></p>
                <p>📞 WhatsApp: <a href="https://wa.me/yourwhatsapplink" target="_blank">+62 821 4515 2022</a></p>
                <p>📸 Instagram: <a href="https://instagram.com/yourclinic" target="_blank">@yourclinic</a></p>
            </div>

            <!-- Service Hours Table -->
            <div class="service-hours">
                <table>
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Opening Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Monday</td>
                            <td>9:00 AM - 6:00 PM</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>9:00 AM - 6:00 PM</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>9:00 AM - 6:00 PM</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>9:00 AM - 6:00 PM</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>9:00 AM - 6:00 PM</td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>10:00 AM - 4:00 PM</td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td>Closed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="footer-bottom">
            <p>&copy; 2025 Your Pet Clinic. All rights reserved.</p>
        </div>
    </div>
</footer>

    @stack('scripts')
</body>
</html>
