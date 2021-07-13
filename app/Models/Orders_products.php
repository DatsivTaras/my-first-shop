<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_products extends Model
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
}
