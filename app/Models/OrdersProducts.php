<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'id',
    ];
    public function products()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
    public function manyproducts()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }
}
