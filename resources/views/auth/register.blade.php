@extends('layouts.app')
@section('title', 'Register')

@section('content')
    @include('partials.nav')

    <section class="vh-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-sm-6 text-black d-flex align-items-center">
                    <div class="px-5 ms-xl-4 w-100" style="max-width: 460px;">
                        <div class="mb-4">
                            <span class="h2 fw-bold">CineHouse</span>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <h3 class="fw-normal mb-3" style="letter-spacing: 1px;">Create account</h3>

                            <div class="mb-3">
                                <label class="form-label" for="name">Nome</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" required
                                    autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone">Telefono</label>
                                <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                    class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                    placeholder="+39 ...">
                                @error('phone')
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

                            <div class="mb-3">
                                <label class="form-label" for="password_confirmation">Conferma Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control form-control-lg" required>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input @error('privacy') is-invalid @enderror" type="checkbox"
                                    name="privacy" id="privacy" value="1" {{ old('privacy') ? 'checked' : '' }}>
                                <label class="form-check-label" for="privacy">
                                    Accetto Privacy & Termini
                                </label>
                                @error('privacy')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-dark btn-lg w-100" type="submit">Registrati</button>

                            <p class="mt-3 mb-0">
                                Hai già un account?
                                <a href="{{ route('login') }}" class="link-primary">Login</a>
                            </p>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://picsum.photos/1200/1200?register" alt="Register image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
@endsection
