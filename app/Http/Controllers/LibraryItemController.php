<?php

namespace App\Http\Controllers;

class LibraryItemController extends Controller
{
    public function create()
    {
        return view('library.create');
    }

    public function store(LibraryItemStoreRequest $r)
    {
        $data = $r->validated();
        if ($r->hasFile('poster')) {
            $data['poster'] = $r->file('poster')->store('posters', 'public');
        }
        $data['user_id'] = auth()->id();
        \App\Models\LibraryItem::create($data);

        return redirect()->route('home')->with('success', 'Grazie! Contenuto aggiunto.');
    }

    public function index(Request $r)
    {
        $q = \App\Models\LibraryItem::query()->latest();
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
