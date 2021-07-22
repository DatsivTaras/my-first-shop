<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Orders_products;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Orders::where('status','>',0)->get();
        $status = (Orders::test());

        return view('admin/orders/index',compact('orders','status'));
    }

    public function show($id)
    {
        $orders = Orders::where('status','>',0)->where('id', $id)->get();

        return view('admin/orders/ordersshow',compact('orders'));
    }

    public function status(Request $request)
    {
        $order = Orders::where('id',$request->order_id)->first();
        $order->id = $request->order_id;
        $order->status = $request->status;
        $order->save();

        return redirect('/orders');
    }



}
