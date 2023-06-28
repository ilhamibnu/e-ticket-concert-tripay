@extends('landing.layout.main')
@section('content')
    <main>

        <header class="site-header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi-person custom-icon me-2"></i>
                            <strong class="text-dark">Welcome to Music Festival 2023</strong>
                        </p>
                    </div>

                </div>
            </div>
        </header>


        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    Dies Natalis
                </a>

                {{-- <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a> --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Artists</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Schedule</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_6">Check Tiket</a>
                        </li>
                    </ul>

                    {{-- <a href="ticket.html" class="btn custom-btn d-lg-block d-none">Buy Ticket</a> --}}
                </div>
            </div>
        </nav>


        <section class="hero-section" id="section_1">
            <div class="section-overlay"></div>

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">

                    <div class="col-12 mt-auto mb-5 text-center">
                        <small>Dies Natalis Presents</small>

                        <h1 class="text-white mb-5">Dies Natalis 2023</h1>

                        <a class="btn custom-btn smoothscroll" href="#section_2">Let's begin</a>
                    </div>

                    <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                        <div class="date-wrap">
                            <h5 class="text-white">
                                <i class="custom-icon bi-clock me-2"></i>
                                10 - 12<sup>th</sup>, Dec 2023
                            </h5>
                        </div>

                        <div class="location-wrap mx-auto py-3 py-lg-0">
                            <h5 class="text-white">
                                <i class="custom-icon bi-geo-alt me-2"></i>
                                National Center, United States
                            </h5>
                        </div>

                        <div class="social-share">
                            <ul class="social-icon d-flex align-items-center justify-content-center">
                                <span class="text-white me-3">Share:</span>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-facebook"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-twitter"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-instagram"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-wrap">
                <video autoplay="" loop="" muted="" class="custom-video" poster="">
                    <source src="{{ asset('landing/videos/pexels-2022395.mp4') }}" type="video/mp4">

                    Your browser does not support the video tag.
                    </source>
                </video>
            </div>
        </section>


        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4">About Dies Natalis 2023</h2>

                            <p class="text-white">Festava Live is free CSS template provided by TemplateMo website.
                                This
                                layout is built on Bootstrap v5.2.2 CSS library. You are free to use this template for
                                your commercial website.</p>

                            <h6 class="text-white mt-4">Once in Lifetime Experience</h6>

                            <p class="text-white">You are not allowed to redistribute the template ZIP file on any
                                other
                                website without a permission.</p>

                            <h6 class="text-white mt-4">Whole Night Party</h6>

                            <p class="text-white">Please tell your friends about our website. Thank you.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="{{ asset('landing/images/images-pexels-alexander-suhorucov-6457579.jpg') }}"
                                class="about-image img-fluid">

                            <div class="about-text-info d-flex">
                                <div class="d-flex">
                                    <i class="about-text-icon bi-person"></i>
                                </div>


                                <div class="ms-4">
                                    <h3>a happy moment</h3>

                                    <p class="mb-0">your amazing festival experience with us</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="artists-section section-padding" id="section_3">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Meet Artists
                        </h2>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="{{ asset('landing/images/artists-joecalih-UmTZqmMvQcw-unsplash.jpg') }}"
                                    class="artists-image img-fluid">
                            </div>

                            <div class="artists-hover">
                                <p>
                                    <strong>Name:</strong>
                                    Madona
                                </p>

                                <p>
                                    <strong>Birthdate:</strong>
                                    August 16, 1958
                                </p>

                                <p>
                                    <strong>Music:</strong>
                                    Pop, R&amp;B
                                </p>

                                <hr>

                                <p class="mb-0">
                                    <strong>Youtube Channel:</strong>
                                    <a href="#">Madona Official</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="{{ asset('landing/images/artists-abstral-official-bdlMO9z5yco-unsplash.jpg') }}"
                                    class="artists-image img-fluid">
                            </div>

                            <div class="artists-hover">
                                <p>
                                    <strong>Name:</strong>
                                    Rihana
                                </p>

                                <p>
                                    <strong>Birthdate:</strong>
                                    Feb 20, 1988
                                </p>

                                <p>
                                    <strong>Music:</strong>
                                    Country
                                </p>

                                <hr>

                                <p class="mb-0">
                                    <strong>Youtube Channel:</strong>
                                    <a href="#">Rihana Official</a>
                                </p>
                            </div>
                        </div>

                        <div class="artists-thumb">
                            <img src="{{ asset('landing/images/artists-soundtrap-rAT6FJ6wltE-unsplash.jpg') }}"
                                class="artists-image img-fluid">

                            <div class="artists-hover">
                                <p>
                                    <strong>Name:</strong>
                                    Bruno Bros
                                </p>

                                <p>
                                    <strong>Birthdate:</strong>
                                    October 8, 1985
                                </p>

                                <p>
                                    <strong>Music:</strong>
                                    Pop
                                </p>

                                <hr>

                                <p class="mb-0">
                                    <strong>Youtube Channel:</strong>
                                    <a href="#">Bruno Official</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="schedule-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Event Schedule

                            <div class="table-responsive">
                                <table class="schedule-table table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>

                                            <th scope="col">Wednesday</th>

                                            <th scope="col">Thursday</th>

                                            <th scope="col">Friday</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row">Day 1</th>

                                            <td class="table-background-image-wrap pop-background-image">
                                                <h3>Pop Night</h3>

                                                <p class="mb-2">5:00 - 7:00 PM</p>

                                                <p>By Adele</p>

                                                <div class="section-overlay"></div>
                                            </td>

                                            <td style="background-color: #F3DCD4"></td>

                                            <td class="table-background-image-wrap rock-background-image">
                                                <h3>Rock &amp; Roll</h3>

                                                <p class="mb-2">7:00 - 11:00 PM</p>

                                                <p>By Rihana</p>

                                                <div class="section-overlay"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Day 2</th>

                                            <td style="background-color: #ECC9C7"></td>

                                            <td>
                                                <h3>DJ Night</h3>

                                                <p class="mb-2">6:30 - 9:30 PM</p>

                                                <p>By Rihana</p>
                                            </td>

                                            <td style="background-color: #D9E3DA"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Day 3</th>

                                            <td class="table-background-image-wrap country-background-image">
                                                <h3>Country Music</h3>

                                                <p class="mb-2">4:30 - 7:30 PM</p>

                                                <p>By Rihana</p>

                                                <div class="section-overlay"></div>
                                            </td>

                                            <td style="background-color: #D1CFC0"></td>

                                            <td>
                                                <h3>Free Styles</h3>

                                                <p class="mb-2">6:00 - 10:00 PM</p>

                                                <p>By Members</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </h2>
                    </div>
                </div>
            </div>
        </section>


        <section class="pricing-section section-padding section-bg" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Plans, you' love</h2>
                    </div>

                    @foreach ($paket as $item)
                        <div class="col-lg-6 col-12">
                            <div class="pricing-thumb">
                                <div class="d-flex">
                                    <div>
                                        <h3><small>{{ $item->name }}</small>Rp.{{ number_format($item->harga) }}</h3>

                                        <p>Including good things:</p>
                                    </div>

                                    <p class="pricing-tag ms-auto">Save up to <span>50%</span>
                                    </p>
                                </div>

                                <ul class="pricing-list mt-3">
                                    <li class="pricing-list-item">platform for potential customers</li>

                                    <li class="pricing-list-item">digital experience</li>

                                    <li class="pricing-list-item">high-quality sound</li>

                                    <li class="pricing-list-item">standard content</li>
                                </ul>

                                <a class="link-fx-1 color-contrast-higher mt-4" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">
                                    <span>Buy Ticket</span>
                                    <svg class="icon" viewbox="0 0 32 32" aria-hidden="true">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="16" cy="16" r="15.5"></circle>
                                            <line x1="10" y1="18" x2="16" y2="12"></line>
                                            <line x1="16" y1="12" x2="22" y2="18"></line>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Interested? Let's talk</h2>

                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                                role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Check Tiket</h5>
                                </button>

                                <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactMap" type="button" role="tab"
                                    aria-controls="nav-ContactMap" aria-selected="false">
                                    <h5>Google Maps</h5>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="/" method="post"
                                    role="form">
                                    @csrf

                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="email" id="contact-name"
                                                    class="form-control" placeholder="Email">
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="tel" name="phone" id="contact-email"
                                                    class="form-control" placeholder="Number Phone">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">

                                            <button type="submit" class="form-control">Check Tiket</button>
                                        </div>
                                    </div>

                                </form>

                                <br><br>

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>


                                        <?php
                                        
                                        $nomer = 1;
                                        
                                        ?>

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $nomer++ }}. {{ $error }}</li>
                                        @endforeach
                                    </div>
                                @elseif ($datatiket)
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>

                                        <li>Nama : {{ $datatiket->name }}</li>
                                        <li>Email : {{ $datatiket->email }}</li>
                                        <li>Phone : {{ $datatiket->phone }}</li>
                                        <li>Paket : {{ $datatiket->paket->name }}</li>
                                        <li>Harga : Rp. {{ number_format($datatiket->paket->harga) }}</li>
                                        <li>Status Pembayaran : {{ $datatiket->status }}</li>
                                        <br>
                                        @if ($datatiket->status == 'pending')
                                            <div class="text-center align-center">
                                                <li>
                                                    Lakukan Pembayaran Lebih Dulu Yaa...

                                                </li>
                                                <br>
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDYB4W6qftrIsETmOy5X3w3j9SrhZEDOovaA&usqp=CAU"
                                                    alt="">
                                            </div>
                                        @else
                                            <li>Qrcode Tiket : </li>
                                            <br>
                                            <div class="text-center align-center">
                                                {!! QrCode::size(150)->generate(base64_encode($datatiket->tiket)) !!}
                                            </div>
                                        @endif

                                    </div>
                                @endif

                            </div>

                            <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                                aria-labelledby="nav-ContactMap-tab">
                                <iframe class="google-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.469402870927!2d120.94861466021855!3d14.106066818082482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd777b1ab54c8f%3A0x6ecc514451ce2be8!2sTagaytay%2C%20Cavite%2C%20Philippines!5e1!3m2!1sen!2smy!4v1670344209509!5m2!1sen!2smy"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- Modal --}}

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title custom-btn" id="exampleModalLabel">Order Ticket
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                    </button>


                                    <?php
                                    
                                    $nomer = 1;
                                    
                                    ?>

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $nomer++ }}. {{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form class="custom-form ticket-form mb-5 mb-lg-0" action="/daftar" method="post"
                                role="form">
                                @csrf
                                <h2 class="text-center mb-4">Get started here</h2>

                                <div class="ticket-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="name" id="ticket-form-name"
                                                class="form-control" placeholder="Full name">
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="email" name="email" id="ticket-form-email"
                                                class="form-control" placeholder="Email address">
                                        </div>
                                    </div>

                                    <input type="tel" class="form-control" name="phone"
                                        placeholder="085-456-7890">

                                    <h6>Choose Ticket Type</h6>

                                    <div class="row">

                                        @foreach ($paket as $data)
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-check form-control">
                                                    <input class="form-check-input" type="radio"
                                                        value="{{ $data->id }}" name="id_paket"
                                                        id="flexRadioDefault{{ $data->id }}">
                                                    <label class="form-check-label"
                                                        for="flexRadioDefault{{ $data->id }}">
                                                        {{ $data->name }} - Rp.{{ number_format($data->harga) }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Buy Ticket</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('sweetalert')
    @if (Session::get('create'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Done!',
                text: 'Anda Berhasil Membeli Tiket!',
            });
        </script>
    @endif
    @if (Session::get('delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Done!',
                text: 'Anda Berhasil Menghapus Pembelian Tiket!',
            });
        </script>
    @endif
    @if (Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data Tiket Tidak Ditemukan!',
            });
        </script>
    @endif
    @if (Session::get('datatiket'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Done!',
                text: 'Data Tiket Ditemukan!',
            });
        </script>
    @endif
@endsection
