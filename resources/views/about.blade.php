@extends('layouts.app')

@section('content')
<!-- AOS Animate on Scroll -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="/css/about.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init();
    });
</script>

<div class="parallax"></div>

<section id="welcome">
    <div style="font-size: 22px; color: #c4a700; margin-bottom: 10px;">Welcome to</div>
    <h2>Aespaw's Cute World!</h2>
    <p>A place where all pets are cared for with love 💕</p>
    <div class="floating-paw">
        <img src="/icons/kumelll/txt.png" alt="Floating Paw" style="width: 100px;">
    </div>
</section>

<section class="hero" data-aos="fade-down">
    <h1>About Aespaw</h1>
    <p>Hi there! This clinic was inspired by a super adorable cat named Kumel, who belongs to Elpi! <img src="/icons/love3.png" style="width: 40px; vertical-align: middle;"></p>
</section>
<h2 class="section-title">Fun Facts About Kumel <img src="/icons/cat.png" style="width: 50px; justify-content: center;"></h2>
<section class="kumel-card" data-aos="fade-up">
    <div class="kumel-image-card">
        <img src="\images\k1.jpg" alt="Kumel the Cat">
    </div>
    <div class="about-text">
        <p>
            Kumel is a spoiled and playful cat who totally rules the house. His daily routine? 
            Eating, sleeping, and using the litter box—but don't even <em>think</em> about giving him 
            anything other than Royal Canin, or he'll go on a hunger strike <img src="/icons/kumelll/cute.png" style="width: 30px; vertical-align: middle;">.
        </p>
        <p>
            Every morning, he jumps on the bed to wake everyone up with his adorable chaos, 
            then zooms around the house like he's training for the Kitty Olympics.
        </p>
        <p>
            He's more than just a pet — <strong>Kumel is the heart and soul of aespaw</strong>, 
            our little inspiration wrapped in soft fur and purring love <img src="/icons/love5.png" style="width: 30px; vertical-align: middle;">.
        </p>
    </div>
</section>

<section data-aos="fade-up">
    <div class="fun-facts">
        <div class="fact">
            <span class="fact-icon"><img src="/icons/kumelll/cool.jpg" style="width: 70px"></span>
            <strong>Cool for Cuddles</strong><br>Kumel might be affectionate, but don't expect snuggles—he's got a pride level over 9000.
        </div>
        <div class="fact">
            <span class="fact-icon"><img src="/icons/kumelll/hide1.png" style="width: 70px"></span>
            <strong>Great Escape Artist… Kinda</strong><br>He tries to sneak out all the time, but the second he sees Papa—boom, full retreat.
        </div>
        <div class="fact">
            <span class="fact-icon"><img src="/icons/kumelll/bath3.png" style="width: 70px"></span>
            <strong>Bath Time = Hide Time</strong><br>Every Sunday morning is a full-on stealth mission… because baths are evil, obviously.
        </div>
    </div>
    
</section>

<section class="doctor-section" data-aos="fade-up">
    <h2 class="section-title2">Our Lovely Doctor</h2>
    <div class="doctor-cards-wrapper">
        <div class="doctor-card">
            <img src="/images/Kia.jpg" alt="Dokter Aespaw">
            <div class="doctor-info">
                <h4>Dr. Saskia Nur Melany Putri</h4>
                <p>~ Veterinary Oncologist ~</p><p>Specializes in diagnosing and treating animal cancers.</p>
            </div>
        </div>
        <div class="doctor-card">
            <img src="/images/Andrew.png" alt="Dokter Aespaw">
            <div class="doctor-info">
                <h4>Dr. Andrew Maridzon Tungga</h4>
                <p>~ Veterinary Dermatologist ~</p><p>Specializes in skin, ear, and allergy problems.</p>
            </div>
        </div>
        <div class="doctor-card">
            <img src="/images/elvi.png" alt="Dokter Aespaw">
            <div class="doctor-info">
                <h4>Dr. Elvia Aptanisa</h4>
                <p>~ Veterinary Anesthesiologist ~</p><p>Expert in pain management and anesthesia during surgery.</p>
            </div>
        </div>
    </div>
</section>


<section data-aos="fade-up">
    <h2 class="section-title">Kumel Gallery <img src="/icons/gallery.png" style="width: 75px; vertical-align: middle;"></h2>
    <div class="gallery">
        <img src="/images/kg/1.png" alt="Kumel 1">
        <img src="/images/kg/2.png" alt="Kumel 2">
        <img src="/images/kg/3.png" alt="Kumel 3">
        <img src="/images/kg/4.png" alt="Kumel 4">
        <img src="/images/kg/5.png" alt="Kumel 5">
        <img src="/images/kg/6.png" alt="Kumel 6">
    </div>
</section>

<section class="faq" data-aos="fade-up">
    <h2 class="section-title"><img src="/icons/faq.png" style="width: 300px; vertical-align: middle;"></h2></h2>

    <div class="faq-item" onclick="this.classList.toggle('active')">
        <h3><img src="/icons/appp.png" style="width: 30px; vertical-align: middle;"> How do I book an appointment?</h3>
        <p>Simply click the “Book an Appointment” button in the menu, or go straight to the schedule page. Easy peasy!</p>
    </div>

    <div class="faq-item" onclick="this.classList.toggle('active')">
        <h3><img src="/icons/inject.png" style="width: 30px; vertical-align: middle;"> Does Kumel get vaccinated here too?</h3>
        <p>Of course! This clinic is Kumel's go-to place for vaccinations and regular check-ups.</p>
    </div>

    <div class="faq-item" onclick="this.classList.toggle('active')">
        <h3><img src="/icons/kumelll/notxt.png" style="width: 30px; vertical-align: middle;"> Is this clinic only for cats?</h3>
        <p>Not at all! We welcome all kinds of furry friends—from tiny puppies to adorable hamsters <img src="/icons/hams.png" style="width: 30px; vertical-align: middle;"></p>
    </div>
</section>
@endsection