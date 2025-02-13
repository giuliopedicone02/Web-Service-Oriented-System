<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}
