@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="body-login">
            <div class="container-login" id="container-login">
                <div class="form-container sign-up-container">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2 class="mb-5">Buat Akun</h2>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="first_name" class="form-label">{{ __('Nama Depan') }}</label>
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="last_name" class="form-label">{{ __('Nama Belakang') }}</label>
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Daftar') }}</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2 class="mb-5">Login</h2>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link"
                                href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
                        @endif
                        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h2>Selamat Datang!</h2>
                            <p>Masukkan email dan password anda untuk masuk ke aplikasi GAS-SIKAT</p>
                            <button class="ghost btn btn-primary" id="signIn">Login</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h2>Selamat Datang!</h2>
                            <p>Masukkan detail pribadi anda dan bergabung bersama kami di Aplikasi GAS-SIKAT</p>
                            <button class="ghost btn btn-primary" id="signUp">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection