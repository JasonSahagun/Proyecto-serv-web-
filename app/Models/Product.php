<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';
    protected $fillable = [
        'nombre',
        'supplier_id',
        'category_id',
        'precio',
        'cantidad',
        'estado',
        
    ];
}
