<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    public function gift()
    {
        return $this->hasMany(Gift::class);
    }
}
