@extends('layouts.app') @section('title', 'Libreria')
@section('content') @include('partials.nav')

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 fw-bold mb-0">Libreria CineHouse</h1>
            @auth <a class="btn btn-dark btn-sm" href="{{ route('library.create') }}">Contribuisci</a> @endauth
        </div>

        <form class="row g-2 mb-3">
            <div class="col-12 col-md-3">
                <select name="type" class="form-select">
                    <option value="">Tutti</option>
                    <option value="film" @selected(request('type') === 'film')>Film</option>
                    <option value="serie" @selected(request('type') === 'serie')>Serie</option>
                    <option value="anime" @selected(request('type') === 'anime')>Anime</option>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <input name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="Cerca per titolo...">
            </div>
            <div class="col-12 col-md-3 d-grid">
                <button class="btn btn-outline-dark">Filtra</button>
            </div>
        </form>

        <div class="row g-3">
            @foreach ($items as $item)
                <div class="col-12 col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img class="card-img-top"
                            src="{{ $item->poster ? asset('storage/' . $item->poster) : 'https://picsum.photos/600/400?lib=' . $item->id }}"
                            alt="">
                        <div class="card-body">
                            <span class="badge bg-secondary text-uppercase">{{ $item->type }}</span>
                            <div class="fw-semibold mt-2">{{ $item->title }}</div>
                            <div class="text-muted small">{{ \Illuminate\Support\Str::limit($item->description, 60) }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">{{ $items->withQueryString()->links() }}</div>
    </div>

    @include('partials.footer')
@endsection
