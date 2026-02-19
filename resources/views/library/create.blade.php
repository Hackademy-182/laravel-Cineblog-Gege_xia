@extends('layouts.app')
@section('title', 'Contribuisci')

@section('content')
    @include('partials.nav')

    <div class="container py-4">
        <div class="bg-white border rounded-4 p-4 shadow-sm">
            <h1 class="h4 fw-bold mb-1">Contribuisci</h1>
            <p class="text-muted mb-4">Invia un contenuto alla libreria CineHouse (visibile subito).</p>

            @if ($errors->any())
                <div class="alert alert-danger small mb-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('library.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label" for="title">Titolo</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="year">Anno</label>
                        <input type="number" id="year" name="year" value="{{ old('year') }}"
                            class="form-control @error('year') is-invalid @enderror" required>
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="type">Tipo</label>
                        <select id="type" name="type" class="form-select @error('type') is-invalid @enderror"
                            required>
                            <option value="film" @selected(old('type') === 'film')>Film</option>
                            <option value="serie" @selected(old('type') === 'serie')>Serie</option>
                            <option value="anime" @selected(old('type') === 'anime')>Anime</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                < <div class="mb-4">
                    <label class="form-label" for="duration">Durata (minuti)</label>
                    <input type="number" id="duration" name="duration" value="{{ old('duration') }}"
                        class="form-control @error('duration') is-invalid @enderror" required>
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
        </div>


        <div class="mb-4">
            <label class="form-label">Generi (scegline almeno 1)</label>
            <div class="border rounded-3 p-2 overflow-auto" style="max-height:120px;">
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($genres as $g)
                        <label class="btn btn-outline-dark btn-sm rounded-pill">
                            <input class="form-check-input me-2" type="checkbox" name="genres[]" value="{{ $g->id }}"
                                @checked(in_array($g->id, old('genres', [])))>
                            {{ $g->name }}
                        </label>
                    @endforeach
                </div>
            </div>
            @error('genres')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label class="form-label" for="poster">Poster (obbligatorio)</label>
            <input type="file" id="poster" name="poster" class="form-control @error('poster') is-invalid @enderror"
                accept="image/*" required>
            @error('poster')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">JPG/PNG • max 2MB</div>
        </div>


        <div class="mb-4">
            <label class="form-label" for="description">Trama</label>
            <textarea id="description" name="description" rows="4"
                class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2 @error('confirm') is-invalid @enderror" type="checkbox" name="confirm"
                id="confirm" value="1" {{ old('confirm', 1) ? 'checked' : '' }}>
            <label class="form-check-label" for="confirm">
                Confermo che i dati sono corretti
            </label>
        </div>
        @error('confirm')
            <div class="text-danger small text-center mb-3">{{ $message }}</div>
        @enderror


        <button type="submit" class="btn btn-dark w-100">Invia richiesta</button>
        </form>
    </div>
    </div>

    @include('partials.footer')
@endsection
