<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Orders;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(Request $request ,$id='')
    {
        $products = Products::where('id',$id)->firstOrFail();

        $orders = Orders::where('user_id',auth()->user()->id)->where('status',0)->first();
        $countsOrders = $orders->ordersProducts()->count();
        return view('show',compact('products','countsOrders'));
    }
}
