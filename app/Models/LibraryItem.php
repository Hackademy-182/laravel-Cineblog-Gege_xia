<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryItem extends Model
{
    protected $fillable = ['user_id', 'type', 'title', 'description', 'poster'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }//
}
