<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'country_id',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function chefs()
    {
        return $this->belongsToMany(Chef::class);
    }
}
