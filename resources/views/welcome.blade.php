@extends('layouts.app')


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- Styles -->

</head>

<body class="">
    <div class="antialiased">
        <div class="container pt-3 ">
            @if (Route::has('login'))
            <div class="welocomNav ">
                <div class="navRigh ">
                    @auth

                    @else
                    <div class="hom">
                        <img src="{{asset('images/logo.png')}}" class="img-fluid rounded-top" alt="">
                    </div>
                    <div class="logRe">
                        <a href="{{ route('login') }}" class="link fs-3 text-decoration-none me-1">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="link fs-3 text-decoration-none">Register</a>
                        @endif
                    </div>
                    @endauth
                </div>
            </div>
            @endif
            <div class="welcom">

                {{-- <h1 class="welcomCaftria" id="welcomCaftria">Cafeteria</h1> --}}
                <h1 class="welcomCaftria text-center" id="welcomCaftria"></h1>

            </div>
        </div>

    </div>

</body>

</html>