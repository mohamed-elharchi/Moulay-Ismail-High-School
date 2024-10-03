@extends('layouts.Acceuill')
@section('title','calendries')
@section('content')
@section('title', 'Calendriers')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title></title>
        <meta content="" name="description">
        <meta content="" name="keywords">




        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <link href="assets/css/ma.css" rel="stylesheet">



    <body>

        <!-- ======= Header ======= -->
        <!-- End Header -->

        <!-- End Hero Section -->

        <main id="main" data-aos="fade" data-aos-delay="1500">

            <!-- Gallery Section -->

            <section id="gallery" class="gallery">
                <div class="header">
                    <a href="#default" class="logo">Pour rechercher Calendriers</a>

                    <div class="header-right">

                            <form action="{{ route('filterByDepartement') }}" method="GET" class="form-inline">
                                <div class="row align-items-center">
                                    <div class="col-sm-8">
                                        <div class="form-group mr-2">
                                            <select class="form-control" id="role" name="role">
                                                <option value="" disabled selected>select your class</option>
                                                @foreach ($utilisationss as $utilisation)
                                                    <option value="{{ $utilisation->departement->name }}">
                                                        {{ $utilisation->departement->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn">Filtrer</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($utilisations as $utilisation)
                            <div class="z">
                                <div class="gallery-item">
                                    <img src="{{ asset('imagess/' . $utilisation->image) }}" class="zzz" alt="">
                                    <div class="gallery-links ">
                                        <a href="{{ asset('imagess/' . $utilisation->image) }}"
                                            title=" <h1>class:{{ $utilisation->departement->name }}</h1>"
                                            class="glightbox "><i class="bi bi-arrows-angle-expand"></i></a>
                                    </div>
                                    <div class="dd" style="color:black;">
                                        <h4>
                                            <span style="color:rgb(233, 137, 27); font-size: 25px;">Class </span>
                                            <span
                                                style="margin-left: 90px;font-size: 15px; color: #000;">{{ $utilisation->departement->name }}</span>
                                            <a href="{{ asset('imagess/' . $utilisation->image) }}"
                                                download="{{ $utilisation->image }}" class="dowland">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </h4>



                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </section>
            <!-- End Gallery Section -->

        </main>


        <!-- Vendor JS Files -->
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/js/main.js"></script>


    </body>

    </html>
@endsection
