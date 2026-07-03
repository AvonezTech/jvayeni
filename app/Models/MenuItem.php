<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['name', 
    'price', 
    'is_special', 
    'is_available',
    'photo',
    'menu_category'];
}