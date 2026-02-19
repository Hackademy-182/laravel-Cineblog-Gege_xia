<header class="container py-4">
    <div id="hero" class="carousel slide rounded-4 overflow-hidden border bg-white" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($hero as $k => $item)
                <div class="carousel-item @if ($k === 0) active @endif">
                    <img class="d-block w-100"
                        src="{{ $item->poster ? asset('storage/' . $item->poster) : 'https://picsum.photos/1200/360?noimg=' . $k }}"
                        alt="">
                    <div class="carousel-caption text-start">
                        <span class="badge bg-dark text-uppercase">{{ $item->type }}</span>
                        <h5 class="fw-bold">{{ $item->title }}</h5>
                        <p class="small d-none d-md-block">{{ \Illuminate\Support\Str::limit($item->description, 90) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#hero" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></button>
    </div>
</header>
