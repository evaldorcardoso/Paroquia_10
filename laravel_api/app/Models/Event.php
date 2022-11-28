<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Event extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'congregation_id',
        'title',
        'event_at',
        'address',
        'description',
        'readings'
    ];

    public function congregation()
    {
        return $this->belongsTo(Congregation::class);
    }
}
