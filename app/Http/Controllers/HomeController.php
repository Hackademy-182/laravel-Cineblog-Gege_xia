<?php

namespace App\Http\Controllers;

use App\Models\LibraryItem;

class HomeController extends Controller
{
    public function index()
    {
        $hero = LibraryItem::latest()->take(3)->get();
        $cards = LibraryItem::latest()->skip(3)->take(4)->get();

        return view('home', compact('hero', 'cards'));
    }
}
