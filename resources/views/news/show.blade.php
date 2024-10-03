@extends('layouts.Acceuill')
@section('content')


<style>
/* General styles */

/* Flex container */
.dd {
  display: flex;
  flex-wrap: wrap;
  margin-top: 50px; /* Allow flex items to wrap to next line */
}

/* Left side (image) */
.f1 {
  width: 100%; /* Take full width on small screens */
  padding: 20px;
}

.f1 img {
  width: 100%;
  height: auto;
  display: block;
}

/* Right side (text) */
.f2 {
  width: 100%; /* Take full width on small screens */
  padding: 20px;
}

.f2 p {
  font-size: 1.2rem;
  line-height: 1.6;
}

/* Sticky elements */
.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  width: 100%; /* Take full width on small screens */
}

/* Styles for specific screen sizes */
@media only screen and (min-width: 600px) {
  /* Adjustments for screens wider than 600px */
  .f1 {
    width: 30%;
  }

  .f2 {
    width: 70%;
  }
}
</style>

@include('Acccueil.zi')

<div class="dd">
  <div class="f1">
    <img class="sticky" src="{{ asset('imagess/' . $news->image) }}" alt="Avatar">
    <h2 class="sticky">{{ $news->title }}</h2>
    <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</span>
  </div>
  <div class="f2">
    <p>
      {{ $news->paragraph }}
    </p>
  </div>
</div>



@endsection
