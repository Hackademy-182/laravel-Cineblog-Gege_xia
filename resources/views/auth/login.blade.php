@extends('layouts.app')
@section('title', 'Login')

@section('content')
    @include('partials.nav')

    <section class="vh-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-sm-6 text-black d-flex align-items-center">
                    <div class="px-5 ms-xl-4 w-100" style="max-width: 420px;">
                        <div class="mb-4">
                            <span class="h2 fw-bold">CineHouse</span>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <h3 class="fw-normal mb-3" style="letter-spacing: 1px;">Log in</h3>

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" required
                                    autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" type="password" name="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="small text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                @endif
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg w-100" type="submit">Login</button>
                            </div>

                            <p class="mb-0">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="link-primary">Register here</a>
                            </p>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://picsum.photos/1200/1200?cinema" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
@endsection
