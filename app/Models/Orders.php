<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'order_id',
        'product_id',
        'email',
        'password',
        'category_id',


    ];
    public function ordersProducts()
    {
        return $this->hasMany(Orders_products::class, 'order_id');
    }
}
