<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'congregation_id',
        'title', 
        'event_at', 
        'address', 
        'description',
        'readings'
    ];
}
