@extends('layouts.main')

@section('content')
    <div style="height: 60px;"></div>
    <div class="unit-5 overlay" style="background-image: url({{asset('partial/images/hero_1.jpg')}});">
        <div class="container text-center">
            <h2 class="mb-0">Contact</h2>
            <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep">></span> <span>Contact</span></p>
        </div>
    </div>
    <div class="py-5 quick-contact-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <h2><span class="icon-room"></span> Location</h2>
                        <p class="mb-0">New York - 2398 <br>  10 Hadson Carl Street</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <h2><span class="icon-clock-o"></span> Service Times</h2>
                        <p class="mb-0">Wednesdays at 6:30PM - 7:30PM <br>
                            Fridays at Sunset - 7:30PM <br>
                            Saturdays at 8:00AM - Sunset</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2><span class="icon-comments"></span> Get In Touch</h2>
                    <p class="mb-0">Email: info@jobfinder.com <br>
                        Phone: (123) 3240-345-9348 </p>
                </div>
            </div>
        </div>
    </div>
@endsection
