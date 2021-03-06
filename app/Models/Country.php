<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
