<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'name',
        'menu_category',
        'description',
        'price',
        'photo',
        'is_available',
        'is_special',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
        'is_special' => 'boolean',
    ];
}