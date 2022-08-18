<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $fillable = [
        'name', 'address', 'pizza', 'price', 'description','borda'
    ];
    use HasFactory;
}
