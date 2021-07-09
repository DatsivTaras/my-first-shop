<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Orders_products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart(Request $request)
    {
        $user = auth()->user()->id;

        $allOrders = Orders::where('user_id',$user)->where('status',0)->first();
        if (!$allOrders) {
            $orders = new Orders();
            $orders->user_id=$user;
            $orders->status=0;
            $orders->save();
        }
        $orders_products = new Orders_products();
        $orders_products->product_id =$request->id;
        if (!$allOrders) {
            $orders_products->order_id = $orders->id;
        }
        if ($allOrders) {
            $orders_products->order_id = $allOrders->id;
        }
        $orders_products->save();

        $countsOrders = $allOrders->ordersProducts->count();

    return json_encode(['count_product'=>$countsOrders]);

    }
}
