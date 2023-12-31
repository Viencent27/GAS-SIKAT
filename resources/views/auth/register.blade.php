@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="body-login">
            <div class="container-login d-flex justify-content-center align-items-center">
                <div class="form-container-register">
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
                        </div>
                        <div class="mb-3">
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
                            <label for="passwordSignUp" class="form-label">{{ __('Password') }}</label>
                            <div class="password-container">
                                <input id="passwordSignUp" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" minlength="8">
                                <div id="passwordWarning" class="password-warning">
                                    <p>Password harus memiliki minimal 8 karakter</p>
                                </div>
                                <input type="checkbox" id="showPasswordSignUp" onclick="togglePassword('SignUp')">
                                <label for="showPasswordSignUp" class="show-password-label">Tampilkan Password</label>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('password.minlength')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Daftar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
