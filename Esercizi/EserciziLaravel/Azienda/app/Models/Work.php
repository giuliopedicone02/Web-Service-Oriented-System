<?php

namespace App\Models;

use App\Http\Controllers\WorkController;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
