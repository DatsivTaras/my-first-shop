<?php
use App\Models\Orders;
function test()
{
    $orders = Orders::where('user_id',auth()->user()->id)->where('status',0)->first();
    $countsProducts='';
    if(!empty($orders->id)){
        $countsProducts = $orders->ordersProducts()->count();
    }
    return $countsProducts;
}
