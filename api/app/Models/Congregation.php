<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congregation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'pastor',
        'lat',
        'lon',
        'active',
        'image'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
