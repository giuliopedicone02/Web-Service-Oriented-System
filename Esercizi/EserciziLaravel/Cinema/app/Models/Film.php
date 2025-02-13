<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
