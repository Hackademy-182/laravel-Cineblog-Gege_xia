<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genres')->latest()->paginate(9);

        return view('films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();

        return view('films.create', compact('genres'));
    }

    public function store(FilmStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $film = Film::create(collect($data)->except('genres')->toArray());

        $film->genres()->attach($data['genres'] ?? []);

        return redirect()->route('films.show', $film)->with('success', 'Film creato!');
    }

    public function show(Film $film)
    {
        $film->load('genres');

        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        $film->load('genres');
        $genres = Genre::orderBy('name')->get();

        return view('films.edit', compact('film', 'genres'));
    }

    public function update(FilmUpdateRequest $request, Film $film)
    {
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            if ($film->poster) {
                Storage::disk('public')->delete($film->poster);
            }
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $film->update(collect($data)->except('genres')->toArray());

        $film->genres()->sync($data['genres'] ?? []);

        return redirect()->route('films.show', $film)->with('success', 'Film aggiornato!');
    }

    public function destroy(Film $film)
    {
        if ($film->poster) {
            Storage::disk('public')->delete($film->poster);
        }
        $film->genres()->detach();
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film eliminato!');
    }
}
