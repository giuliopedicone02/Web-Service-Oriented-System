<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }
}
