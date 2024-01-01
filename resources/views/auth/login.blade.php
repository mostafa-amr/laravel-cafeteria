@extends('layouts.app')


@section('content')



<div class="login   ">
    @if (Route::has('login'))
    <div class="welocomNav ">
        <div class="navRigh ">
            @auth

            @else
            <div class="hom">
                <a href="{{ url('/') }}" class="fs-3 text-decoration-none ">Home</a>
            </div>
            <div class="logRe">
                <a href="{{ route('login') }}" class="fs-3 text-decoration-none me-1">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="fs-3 text-decoration-none">Register</a>
                @endif
            </div>
            @endauth
        </div>
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center  col-md-8 col-10">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <h1 class="text-center mt-4">Cafeteria </h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="text-center  m-auto">
                                    <button type="submit" class="btn btn-success my-1">
                                        {{ __('Login') }}
                                    </button>
                                    <a href="/auth/google" class="btn btn-primary my-1">
                                        Google
                                    </a>
                                    <a href="/userHome" class="btn btn-primary my-1">
                                        visit as guest
                                    </a>


                                </div>
                                @if (Route::has('password.request'))
                                <div class="Forgot mt-3 text-center">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection