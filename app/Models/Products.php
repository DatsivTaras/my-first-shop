<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'email',
        'password',
        'category_id',


    ];

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function inOrder($userid)
    {
        $order = Orders::where('user_id', $userid)->where('status', 0)->first();
        if($order){
            return $order->products()->where('product_id', $this->id)->exists();
        }
        }

}
