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
        $orders = Orders::where('status', 1)->get();

        return view('admin/orders/index',compact('orders'));
    }

    public function show($id){
        $orders = Orders::where('status', 1)->where('id', $id)->get();

        return view('admin/orders/ordersshow',compact('orders'));
    }
}
