<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
