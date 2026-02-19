<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryItemStoreRequest;
use App\Models\Genre;
use App\Models\LibraryItem;
use Illuminate\Http\Request;

class LibraryItemController extends Controller
{
    public function create()
    {
        $genres = Genre::orderBy('name')->get();

        return view('library.create', compact('genres'));
    }

    public function store(LibraryItemStoreRequest $r)
    {
        $data = $r->validated();

        $data['poster'] = $r->file('poster')->store('posters', 'public');
        $data['user_id'] = auth()->id();

        $item = LibraryItem::create(collect($data)->except(['genres', 'confirm'])->toArray());

        $item->genres()->sync($data['genres']);

        return redirect()->route('home')->with('success', 'Grazie! Contenuto aggiunto.');
    }

    public function index(Request $r)
    {
        $q = LibraryItem::query()->latest();

        if ($r->type) {
            $q->where('type', $r->type);
        }
        if ($r->search) {
            $q->where('title', 'like', '%'.$r->search.'%');
        }

        $items = $q->paginate(12);

        return view('library.index', compact('items'));
    }
}
