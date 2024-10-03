@extends('layouts.Acceuill')
@section('title', 'Login')
@section('content')

    @if (session('success'))
        <div class="">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form> --}}

    <div class="loginContent">
        <div class="loginImage">
            <img src="{{ asset('images/books.jpg') }}" alt="lignImage" width="100%">
        </div>
        <div class="center">


            <h1>Se connecter</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="txt_field">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

                    <span></span>
                    <label>Email</label>

                </div>
                @error('email')
                    <span class="">{{ $message }}</span>
                @enderror
                <div class="txt_field">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span></span>
                    <label>Mot de passe</label>

                </div>
                <input type="submit" class="connecter" value="connecter" />
                <div class="signup_link" type="submit">Spécial pour la gestion de l'institution!</div>
            </form>


        </div>


    </div>

@endsection
