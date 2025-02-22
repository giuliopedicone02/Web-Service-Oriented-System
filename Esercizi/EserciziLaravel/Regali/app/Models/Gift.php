<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    public function kid()
    {
        return $this->hasMany(Kid::class);
    }
}
