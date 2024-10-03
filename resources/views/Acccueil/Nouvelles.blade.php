@extends('layouts.Acceuill')
@section('title','Nouvelles')
@section('content')
@section('title', 'Nouvelles')

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="{{ asset('css/pages.css') }}">
</head>

<body>
@include('Acccueil.zi')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider" class="owl-carousel">
                <!-- Loop over $newsList data -->
                @foreach($newsList as $news)
                <div class="post-slide">
                    <div class="post-img">
                        <img src="{{ asset('imagess/' . $news->image) }}" style="width: 100%; height: 300px;" alt="">
                        <a href="{{ route('news.show', $news->id) }}" class="over-layer"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="{{ route('news.show', $news->id) }}">  {{ $news->title }}.</a>
                        </h3>
                        <p class="post-description">{{ substr($news->paragraph, 0, 40) }}@if (strlen($news->paragraph) > 100)@endif ..........</p>
                        <span class="post-date"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</span>
                        <a href="{{ route('news.show', $news->id) }}" class="read-more">Show</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- partial -->
  <script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
<script>
  $(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true
    });
});
</script>
</body>
</html>


@endsection

