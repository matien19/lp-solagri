@extends('layout.main')

@push('css')
<style>
    /* Penyesuaian kustom mengikuti gaya input & tombol dari template AgriCulture */
    .login-section {
        background-color: var(--background-color);
        padding: 60px 0;
    }

    .login-card {
        background-color: var(--surface-color);
        box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
    }

    .login-card .form-control {
        background-color: var(--surface-color);
        color: var(--default-color);
        border: 1px solid color-mix(in srgb, var(--default-color), transparent 70%);
        border-radius: 4px;
        padding: 10px 15px;
        font-size: 14px;
    }

    .login-card .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: none;
        background-color: var(--surface-color);
        color: var(--default-color);
    }

    .login-card .form-control::placeholder {
        color: color-mix(in srgb, var(--default-color), transparent 50%);
    }

    .login-card .btn-login {
        background-color: var(--accent-color);
        color: var(--contrast-color);
        border: 0;
        border-radius: 4px;
        padding: 12px 20px;
        transition: 0.4s;
        font-weight: 500;
    }

    .login-card .btn-login:hover {
        background-color: color-mix(in srgb, var(--accent-color) 90%, black 15%);
        color: var(--contrast-color);
    }

    .login-card .forgot-link {
        color: color-mix(in srgb, var(--default-color), transparent 40%);
        transition: 0.3s;
        font-size: 14px;
        text-decoration: none;
    }

    .login-card .forgot-link:hover {
        color: var(--accent-color);
    }
</style>
@endpush

@section('content')
<!-- Login Section -->
<section class="section login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-card ">

                    <h3 class="text-center mb-4"
                        style="color: var(--heading-color); font-family: var(--heading-font); font-weight: 700;">
                        Login Admin
                    </h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label"
                                style="color: var(--default-color); font-weight: 500;">
                                {{ __('Email Address') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Masukkan email Anda">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label"
                                style="color: var(--default-color); font-weight: 500;">
                                {{ __('Password') }}
                            </label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Masukkan password Anda">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember"
                                style="color: color-mix(in srgb, var(--default-color), transparent 20%);">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn-login w-100">
                                {{ __('Login') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection