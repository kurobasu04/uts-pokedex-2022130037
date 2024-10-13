<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'species',
        'primary_type',
        'weight',
        'height',
        'hp',
        'attack',
        'defense',
        'is_legendary',
        'photo',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
        'height' => 'decimal:2',
        'is_legendary' => 'boolean',
    ];
}
