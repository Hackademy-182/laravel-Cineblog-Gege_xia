@extends('layouts.app') @section('title', 'Contribuisci')
@section('content') @include('partials.nav')
    <section class="vh-100">
        <div class="container h-100 d-flex align-items-center">
            <div class="bg-white border rounded-4 p-4 w-100 shadow-sm" style="max-width:520px;">
                <h3 class="fw-normal mb-3">Contribuisci</h3>

                @if ($errors->any())
                    <div class="alert alert-danger small mb-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('library.store') }}" enctype="multipart/form-data">@csrf
                    <div class="mb-3"><label class="form-label">Tipo</label>
                        <select name="type" class="form-select">
                            <option value="film" @selected(old('type') === 'film')>Film</option>
                            <option value="serie" @selected(old('type') === 'serie')>Serie</option>
                            <option value="anime" @selected(old('type') === 'anime')>Anime</option>
                        </select>
                    </div>

                    <div class="mb-3"><label class="form-label">Titolo</label>
                        <input name="title" value="{{ old('title') }}" class="form-control" required>
                    </div>

                    <div class="mb-3"><label class="form-label">Descrizione (obbligatoria)</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3"><label class="form-label">Poster (opzionale)</label>
                        <input type="file" name="poster" class="form-control">
                    </div>

                    <button
