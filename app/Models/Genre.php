<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function libraryItems()
    {
        return $this->belongsToMany(LibraryItem::class, 'genre_library_item');
    }
}
