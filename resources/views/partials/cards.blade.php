<section class="container pb-4">
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h2 class="h5 fw-bold mb-0">Ultimi inseriti</h2>
        <a class="small" href="{{ route('library.index') }}">Vai alla Libreria</a>
    </div>

    <div class="row g-3">
        @foreach ($cards as $item)
            <div class="col-12 col-md-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img class="card-img-top"
                        src="{{ $item->poster ? asset('storage/' . $item->poster) : 'https://picsum.photos/600/400?card=' . $item->id }}"
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
</section>
