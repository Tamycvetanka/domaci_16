<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Forecast extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'temperature',
        'date',
        'weather_type',
    ];

    protected $casts = [
        'temperature' => 'decimal:2',
        'date' => 'date',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}

