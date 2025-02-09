<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function work()
    {
        return $this->hasMany(Work::class);
    }
}
