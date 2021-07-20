<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
    ];

    public function products()
    {
        return $this->hasMany(OrdersProducts::class, 'order_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
