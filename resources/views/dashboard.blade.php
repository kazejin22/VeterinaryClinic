@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/home.css">


<div>
    {{-- Hero Section --}}
<section class="hero-section">
    <div class="hero-content">
        <h1>Premium Pet Care Services</h1>
        <p>Trusted by pet lovers. Because your pets deserve the best.</p>
        <a href="{{ route('appointments.create') }}" class="button btn-secondary">Book an Appointment</a>
        <a href="{{ route('pets.create') }}" class="button btn-primary">Add Your Pet</a>
    </div>
</section>

    {{-- Services Section --}}
    <section>
        <h2 class="section-title">Our Top Services</h2>
        <div class="cards">
            <div class="card">
                <h3>Vaccination</h3>
                <p>Protect your pets from diseases with our complete vaccination packages.</p>
            </div>
            <div class="card">
                <h3>Flea Treatment</h3>
                <p>A variety of quality products for pets, such as food, accessories and other supplies.</p>
            </div>
            <div class="card">
                <h3>Pet Grooming</h3>
                <p>A full grooming service including bath, nail trimming, and haircuts for pets.</p>
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section style="background-color: #caf0f8;">
        <h2 class="section-title">Why Choose Us?</h2>
        <div class="cards">
            <div class="card">
                <h4>Experienced Vets</h4>
                <p>Certified veterinarians with years of hands-on experience.</p>
            </div>
            <div class="card">
                <h4>Affordable Prices</h4>
                <p>Fair pricing without compromising service quality.</p>
            </div>
            <div class="card">
                <h4>Compassionate Care</h4>
                <p>We treat every pet with love, kindness, and full attention.</p>
            </div>
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="cta">
        <h3>Ready to Register Your Pet?</h3>
        <p>Add your pet's profile now and enjoy our personalized services.</p>
        <a href="{{ route('pets.create') }}" class="button btn-primary">Add Your Pet</a>
    </section>
</div>
@endsection
