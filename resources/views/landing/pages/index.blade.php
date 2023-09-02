@extends('landing.layout.main')
@section('content')
<main>

    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-person custom-icon me-2"></i>
                        <strong class="text-dark">Welcome to Maxilla 2023</strong>
                    </p>
                </div>

            </div>
        </div>
    </header>


    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                Maxilla 2023
            </a>

            {{-- <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a> --}}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">Home</a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">About</a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">Artists</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">Schedule</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Ticket</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">Check Tiket</a>
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
                    <small>We Are Presents</small>

                    <h1 class="text-white mb-5">Maxilla 2023</h1>

                    <button class="btn custom-btn" data-toggle="modal" data-target="#modalpanduan"><span>Video Panduan</span>
                    </button>
                </div>

                <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                    <div class="date-wrap">
                        <h5 class="text-white">
                            <i class="custom-icon bi-clock me-2"></i>
                            11 Agustus 2023
                        </h5>
                    </div>

                    <div class="location-wrap mx-auto py-3 py-lg-0">
                        <h5 class="text-white">
                            <i class="custom-icon bi-geo-alt me-2"></i>
                            Auditorium Poltekkes Kemenkes Surabaya
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




    <section class="artists-section section-padding" id="section_2">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 text-center">
                    <h2 class="mb-4">Artists
                    </h2>
                </div>



                <!--<div class="col-lg-5 col-12">-->
                <div class="artists-thumb">

                    <!--<div class="artists-image-wrap">-->
                    <img src="{{ asset('landing/images/personil-lavora.jpg') }}" class="artists-image">
                    <!--</div>-->

                    <div class="artists-hover">
                        <p>
                            Name:
                            Lavora
                        </p>
                        <p>
                            Tiktok:
                            <a href="https://www.tiktok.com/@lavoraofficial?lang=en">Lavora Official</a>
                        </p>
                        <p>
                            Instagram:
                            <a href="https://www.instagram.com/lavora.official/?hl=en">Lavora Official</a>
                        </p>
                        <p>
                            Youtube Channel:
                            <a href="https://www.youtube.com/channel/UCEt7GLWucbgnrxth-JLYApA">Lavora Official</a>
                        </p>
                    </div>
                </div>
                <!--</div>-->

                <!--<div class="col-lg-5 col-12">-->
                <!--    <div class="artists-thumb">-->
                <!--        <div class="artists-image-wrap">-->
                <!--            <img src="{{ asset('landing/images/artists-abstral-official-bdlMO9z5yco-unsplash.jpg') }}" class="artists-image img-fluid">-->
                <!--        </div>-->

                <!--        <div class="artists-hover">-->
                <!--            <p>-->
                <!--                <strong>Name:</strong>-->
                <!--                Rihana-->
                <!--            </p>-->

                <!--            <p>-->
                <!--                <strong>Birthdate:</strong>-->
                <!--                Feb 20, 1988-->
                <!--            </p>-->

                <!--            <p>-->
                <!--                <strong>Music:</strong>-->
                <!--                Country-->
                <!--            </p>-->

                <!--            <hr>-->

                <!--            <p class="mb-0">-->
                <!--                <strong>Youtube Channel:</strong>-->
                <!--                <a href="#">Rihana Official</a>-->
                <!--            </p>-->
                <!--        </div>-->
                <!--    </div>-->

                <!--    <div class="artists-thumb">-->
                <!--        <img src="{{ asset('landing/images/artists-soundtrap-rAT6FJ6wltE-unsplash.jpg') }}" class="artists-image img-fluid">-->

                <!--        <div class="artists-hover">-->
                <!--            <p>-->
                <!--                <strong>Name:</strong>-->
                <!--                Bruno Bros-->
                <!--            </p>-->

                <!--            <p>-->
                <!--                <strong>Birthdate:</strong>-->
                <!--                October 8, 1985-->
                <!--            </p>-->

                <!--            <p>-->
                <!--                <strong>Music:</strong>-->
                <!--                Pop-->
                <!--            </p>-->

                <!--            <hr>-->

                <!--            <p class="mb-0">-->
                <!--                <strong>Youtube Channel:</strong>-->
                <!--                <a href="#">Bruno Official</a>-->
                <!--            </p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

            </div>
        </div>
    </section>


    <section class="schedule-section section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">Event Schedule

                        <div class="table-responsive">
                            <table class="schedule-table table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Kegiatan</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <h3>17.50 - 19.00 WIB</h3>
                                        </th>

                                        <td>
                                            <h3>Registrasi Penonton</h3>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <h3>19.00 - 19.10 WIB</h3>

                                        </th>

                                        <td>
                                            <h3>Pembukaan MC</h3>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <h3>19.10 - 20.00 WIB</h3>

                                        </th>

                                        <td>
                                            <h3>Penampilan Mahasiswa JKG</h3>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <h3>20.00 - 20.15 WIB</h3>

                                        </th>

                                        <td>
                                            <h3>Penayangan Sponsor</h3>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <h3>20.15 - 21.00 WIB</h3>

                                        </th>

                                        <td>
                                            <h3>Penampilan Lavora</h3>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <h3>21.00 - 21.05 WIB</h3>

                                        </th>

                                        <td>
                                            <h3>Penutupan</h3>

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


    <section class="pricing-section section-padding section-bg" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    @if ($paket->count() == 0)
                    <h2 class="text-center mb-4">Mohon Maaf Tiket Tidak Tersedia</h2>
                    @else
                    <h2 class="text-center mb-4">Choose Your Ticket!</h2>
                    @endif

                </div>

                {{-- <div class="text-center aligment-center">
                    <div class="tab-content shadow-lg mt-5 mb-5">
                        <h4>Information</h4>
                        <p>
                            <li>Setelah melakukan pemesanan dan pembayaran ticket, silahkan menggunakan fitur check ticket untuk melihat detail ticket anda</li>
                        </p>
                    </div>
                </div> --}}

                @foreach($paket as $item)
                <div class="col-lg-6 col-12">
                    <div class="pricing-thumb">
                        <div class="d-flex">
                            <div>
                                <h3><small>{{ $item->name }}</small><br>Rp.{{ number_format($item->harga) }}</h3>
                                {{-- <p>Including good things:</p> --}}
                            </div>

                            <p class="pricing-tag ms-auto">Tersedia <span>{{$item->sisa }}</span>
                            </p>
                        </div>

                        <ul class="mt-4">
                            <li class="pricing-list-item">{{ $item->keterangan }}</li>
                            <li class="pricing-list-item">Harga diatas sudah termasuk biaya admin</li>
                        </ul>


                        <div class="text-center">
                            <button class="btn custom-btn" data-toggle="modal" data-target="#modalorder"><span>Buy Ticket</span>
                            </button>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="contact-section section-padding" id="section_5">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="text-center mb-4">Check Your Ticket!</h2>

                    <nav class="d-flex justify-content-center">
                        <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab" data-bs-target="#nav-ContactForm" type="button" role="tab" aria-controls="nav-ContactForm" aria-selected="false">
                                <h5>Check Tiket</h5>
                            </button>

                            <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab" data-bs-target="#nav-ContactMap" type="button" role="tab" aria-controls="nav-ContactMap" aria-selected="false">
                                <h5>Google Maps</h5>
                            </button>
                        </div>
                    </nav>

                    <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel" aria-labelledby="nav-ContactForm-tab">

                            <form class="custom-form contact-form mb-5 mb-lg-0" action="/" method="post" role="form">
                                <div class="text-center aligment-center">

                                    <h4>Information</h4>
                                    <p>
                                        <li>Setelah melakukan pemesanan dan pembayaran ticket, silahkan menggunakan fitur check ticket untuk melihat detail ticket anda</li>
                                    </p>


                                </div>
                                @csrf
                                <div class="contact-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="email" name="email" value="{{ Session::get('cemail') }}" id="contact-name" class="form-control" placeholder="Email" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="tel" name="phone" value="{{ Session::get('cphone') }}" id="contact-email" class="form-control" placeholder="Number Phone" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">

                                        <button type="submit" class="form-control">Check Tiket</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <br><br>

                        @if($datatiket)
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>

                            <li>Nama : {{ $datatiket->name }}</li>
                            <li>Email : {{ $datatiket->email }}</li>
                            <li>Phone : {{ $datatiket->phone }}</li>
                            <li>Paket : {{ $datatiket->paket->name }}</li>
                            <li>Harga : Rp. {{ number_format($datatiket->paket->harga) }}</li>
                            <li>Status Pembayaran : {{ $datatiket->status }}</li>
                            <br>

                            @if ($datatiket->status == 'UNPAID')

                            <div class="text-center align-center">
                                <li>
                                    Lakukan Pembayaran Lebih Dulu Yaa...

                                </li>

                                <a class="btn btn-success" target="blank_" href="{{ $datatiket->checkout_url }}">Bayar</a>
                                {{-- <li>Bank : {{ $datatiket->bank }}</li>
                                <li>Nomor Virtual Account : {{ $datatiket->va }}</li>
                                <li>Kadaluarsa : {{ $datatiket->kadaluarsa }}</li> --}}

                                <br>

                                <li>Apabila Pembayaran Anda Mengalami Masalah, Ingin Mengubah Metode Pembayaran, Code VA Tidak Ditemukan, Silahkan Lakukan Pembatan Tiket, Kemudian
                                    Pesan Kembali</li>
                                <div class="text-center align-center">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalbatal">Batalkan Tiket</button>
                                </div>

                                <div class="modal fade bd-example-modal-lg" id="modalbatal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Pembatalan Tiket
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="custom-form ticket-form mb-5 mb-lg-0" action="/bataltiket/{{ $datatiket->id }}" method="post" role="form">
                                                        @csrf
                                                        @method('delete')
                                                        <span>{{ $datatiket->name }}, Anda Yakin Akan Melakukan Pembatalan Tiket ? </span><br><br>
                                                        <button class="btn btn-danger" type="submit">Batalkan
                                                            Tiket</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            @elseif ($datatiket->status == 'EXPIRED')

                            <div class="text-center align-center">
                                <li>
                                    Pembayaran Anda Kadaluarsa

                                </li>

                                <br>
                                <li>Apabila Pembayaran Anda Kadaluarsa, Silahkan Lakukan Pembatalan Tiket, Kemudian
                                    Pesan Kembali</li>
                                <div class="text-center align-center">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalbatal">Batalkan Tiket</button>
                                </div>

                                <div class="modal fade bd-example-modal-lg" id="modalbatal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Pembatalan Tiket
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="custom-form ticket-form mb-5 mb-lg-0" action="/bataltiket/{{ $datatiket->id }}" method="post" role="form">
                                                        @csrf
                                                        @method('delete')
                                                        <span>{{ $datatiket->name }}, Anda Yakin Akan Melakukan Pembatalan Tiket ? </span><br><br>
                                                        <button class="btn btn-danger" type="submit">Batalkan
                                                            Tiket</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @elseif ($datatiket->status == 'PAID')

                            <li>QrCode Tiket : </li>
                            <br>
                            <div class="text-center align-center">
                                {!! DNS2D::getBarcodeHTML($datatiket->tiket, 'QRCODE', 7,7) !!}
                            </div>

                            <br>
                            <li>Lakukan scan ticket pada saat di pintu masuk </li>

                            @endif


                        </div>
                        @endif

                        <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel" aria-labelledby="nav-ContactMap-tab">
                            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.62172062228!2d112.75953857591851!3d-7.283809171587563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbcadbad37a7%3A0x3457228a16c03aee!2sAuditorium%20Politeknik%20Kesehatan%20Kemenkes%20Surabaya!5e0!3m2!1sen!2sid!4v1690285640746!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- Modal --}}

    <div class="modal fade bd-example-modal-lg" id="modalpanduan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title custom-btn" id="exampleModalLabel">Video Panduan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="video-container">
                            <iframe style="" src="https://www.youtube.com/embed/ESzG_kmzpYg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal --}}

    <div class="modal fade bd-example-modal-lg" id="modalorder" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>


                            <?php

                                    $nomer = 1;

                                    ?>

                            @foreach($errors->all() as $error)
                            <li>{{ $nomer++ }}. {{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        <form class="custom-form ticket-form mb-5 mb-lg-0" action="/daftar" method="post" role="form">
                            @csrf
                            {{-- <h2 class="text-center mb-4">Get started here</h2> --}}

                            <div class="ticket-form-body">
                                <h6>Fill The Form</h6>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="name" value="{{ Session::get('dname') }}" id="ticket-form-name" class="form-control" placeholder="Full name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="email" name="email" value="{{ Session::get('demail') }}" id="ticket-form-email" class="form-control" placeholder="Email address" required>
                                    </div>
                                </div>

                                <input type="tel" class="form-control" name="phone" value="{{ Session::get('dphone') }}" placeholder="085-456-7890">

                                <h6>Choose Ticket Type</h6>

                                <div class="row">

                                    @foreach($paket as $data)
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-check form-control">
                                            <input class="form-check-input" type="radio" value="{{ $data->id }}" name="id_paket" id="flexRadioDefault{{ $data->id }}">
                                            <label class="form-check-label alignment-center" for="flexRadioDefault{{ $data->id }}">
                                                {{ $data->name }}<br> Rp. {{ number_format($data->harga) }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                                <h6>Choose Payment Method</h6>

                                <div class="row">

                                    @foreach ($paymentChannel as $dataa )
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-check form-control">
                                            <input class="form-check-input" type="radio" value="{{ $dataa->code }}" name="payment_method" id="flexRadioDefault{{ $dataa->code }}">
                                            <label class="form-check-label" for="flexRadioDefault{{ $dataa->code }}">
                                                {{ $dataa->name }}<br> + Rp.{{ number_format($dataa->fee_customer->flat) }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{-- <div class="mb-3">
                                        <select class="form-select" name="payment_method" aria-label="Default select example">
                                            <option selected>Pilih Metode Pembayaran</option>
                                            @foreach ($paymentChannel as $dataa )
                                            <option value="{{ $dataa->code }}">{{ $dataa->name }}</option>
                                    @endforeach
                                    </select>
                                    </div> --}}

                            </div>

                            <div class="row">
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

@section('script')

<script type="text/javascript" src="{{ asset('landing/qrcodejs/qrcode.js') }}"></script>
{{-- <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('{{ $snapToken }}');
    };

</script> --}}


@endsection

@section('sweetalert')
@if(Session::get('create'))
<script>
    window.location.href = "/#section_5";
    Swal.fire({
        icon: 'success'
        , title: 'Done!'
        , text: 'Anda Berhasil Melakukan Pembelian Tiket!, Lakukan Pembayaran Pada Menu Check Tiket'
    , });

</script>
@endif
@if(Session::get('paketnonaktif'))

<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Paket Tidak Aktif!'
    , });

</script>
@endif
@if(Session::get('pakettidaktersedia'))

<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Tiket Tidak Tersedia!'
    , });

</script>
@endif
@if(Session::get('pakethabis'))

<script>
    window.location.href = "/#section_5";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Anda Tidak Segera Melakukan Pembayaran!, Tiket Sudah Habis!, Data Anda Telah Dihapus, Supaya Anda Dapat Melakukan Pemesanan Tiket Lain Yang Masih Tersedia'
    , });

</script>
@endif
@if(Session::get('delete'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Done!'
        , text: 'Anda Berhasil Menghapus Pembelian Tiket!'
    , });

</script>
@endif
@if(Session::get('error'))
<script>
    window.location.href = "/#section_5";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Tiket Tidak Ditemukan!'
    , });

</script>
@endif
@if($datatiket != null)
<script>
    window.location.href = "/#section_5";
    Swal.fire({
        icon: 'success'
        , title: 'Done!'
        , text: 'Tiket Ditemukan!'
    , });

</script>
@endif
@if(Session::get('bataltiket'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Done!'
        , text: 'Ticket Anda Berhasil Dibatalkan!'
    , });

</script>
@endif
@if(Session::get('sudahterdaftar'))
<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Email Dan Nomor Telepon Sudah Terdaftar!'
    , });

</script>
@endif
@if(Session::get('emailterdaftar'))
<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Email Sudah Terdaftar!'
    , });

</script>
@endif
@if(Session::get('phoneterdaftar'))
<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Nomor Telepon Sudah Terdaftar!'
    , });

</script>
@endif
@if(Session::get('paketkosong'))
<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Pilih Paket Terlebih Dahulu!'
    , });

</script>
@endif
@if(Session::get('metodepembayarankosong'))
<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Metode Pembayaran Kosong!'
    , });

</script>
@endif
@if(Session::get('gagal'))
<script>
    window.location.href = "/#section_4";
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Gagal Melakukan Pembelian Tiket!'
    , });

</script>
@endif
@endsection
