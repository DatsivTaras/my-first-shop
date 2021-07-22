<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'surname',
        'phone',
        'address',
        'status',
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
    public static function test()
    {
        return [
            0 => 'В корзині',
            1 => 'Очікується на розгляд ',
            2 => 'Зоглядається',
            3 => 'Приняте',
            4 => 'Готове'
        ];
    }

}
