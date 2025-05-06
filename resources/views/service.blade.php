@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/service.css">
<div class="container">
    <h2>Available Services</h2>

    <div class="services">
        <div class="services">
            <div class="service" onclick="flipCard(1)" id="service-1">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/1.png" style="width: 100px"></div>
                    <h3> Pet Grooming</h3>
                </div>
                <div class="back">
                    <h3> Pet Grooming</h3>
                    <p><strong>Description:</strong>A full grooming service including bath, nail trimming, and haircuts for pets.</p>
                    <p><strong>Cost:</strong>$30</p>
                </div>
            </div>

            <div class="service" onclick="flipCard(2)" id="service-2">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/2.png" style="width: 100px"></div>
                    <h3>Vet Consultation</h3>
                </div>
                <div class="back">
                    <h3>Vet Consultation</h3>
                    <p><strong>Description:</strong> A check-up consultation with a licensed veterinarian to assess your pet's health.</p>
                    <p><strong>Cost:</strong>$50</p>
                </div>
            </div>

            <div class="service" onclick="flipCard(3)" id="service-3">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/3.png" style="width: 100px"></div>
                    <h3>Vaccination</h3>
                </div>
                <div class="back">
                    <h3>Vaccination</h3>
                    <p><strong>Description:</strong>Administering vaccines to ensure your pet stays healthy and protected against diseases.</p>
                    <p><strong>Cost:</strong>$40</p>
                </div>
            </div>

            <div class="service" onclick="flipCard(4)" id="service-4">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/4.png" style="width: 100px"></div>
                    <h3>Dental Cleaning</h3>
                </div>
                <div class="back">
                    <h3>Dental Cleaning</h3>
                    <p><strong>Description:</strong>Professional cleaning to maintain your pet's oral hygiene and prevent dental issues.</p>
                    <p><strong>Cost:</strong>$45</p>
                </div>
            </div>

            <div class="service" onclick="flipCard(5)" id="service-5">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/5.png" style="width: 100px"></div>
                    <h3>Pet Boarding</h3>
                </div>
                <div class="back">
                    <h3>Pet Boarding</h3>
                    <p><strong>Description:</strong>Treatment to eliminate fleas and prevent future infestations in your pet's fur and skin.</p>
                    <p><strong>Cost:</strong>$25/night</p>
                </div>
            </div>

            <div class="service" onclick="flipCard(6)" id="service-6">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/6.png" style="width: 100px"></div>
                    <h3>Flea Treatment</h3>
                </div>
                <div class="back">
                    <h3>Flea Treatment</h3>
                    <p><strong>Description:</strong> A variety of quality products for pets, such as food, accessories and other supplies.</p>
                    <p><strong>Cost:</strong>$35</p>
                </div>
            </div>

            <div class="service" onclick="flipCard(7)" id="service-7">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/7.png" style="width: 100px"></div>
                    <h3>Surgery (Minor)</h3>
                </div>
                <div class="back">
                    <h3>Surgery (Minor)</h3>
                    <p><strong>Description:</strong>Minor surgical procedures such as spaying, neutering, or wound stitching.</p>
                    <p><strong>Cost:</strong>$150</p>
                </div>
            </div>

            <div class="service" onclick="flipCard(8)" id="service-8">
                <div class="front">
                    <div class="service-icon"><img src="/images/serv-icon/8.png" style="width: 100px"></div>
                    <h3>Pet Training</h3>
                </div>
                <div class="back">
                    <h3>Pet Training</h3>
                    <p><strong>Description:</strong>Basic obedience training sessions for dogs to improve behavior and commands.</p>
                    <p><strong>Cost:</strong>$60/session</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function flipCard(serviceId) {
        var service = document.getElementById('service-' + serviceId);
        service.classList.toggle('flip');
    }
</script>
@endpush
@endsection
