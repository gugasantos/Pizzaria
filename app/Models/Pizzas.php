<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{

    protected $table = 'pizzas';
    protected $fillable = [
        'name', 'price', 'description', 'photo'
    ];
    use HasFactory;
}
