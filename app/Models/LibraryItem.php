<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryItem extends Model
{
    protected $fillable = ['user_id', 'type', 'title', 'year', 'description', 'duration', 'poster'];

    //
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_library_item');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
