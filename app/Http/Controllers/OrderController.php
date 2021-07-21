<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\User;
use App\Models\OrdersProducts;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cart()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $order = Orders::where('user_id',auth()->user()->id)->where('status',0)->first();
        $sumPrice = 0;
        if($order){
            foreach ($order->products as $product) {
                $price = $product->products->price;
                $sumPrice = $sumPrice + $price;
            }
        }
        return view('cart',compact('order','sumPrice','user'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->id;
        $userId = auth()->user()->id;

        $order = Orders::where('user_id', $userId)->where('status', 0)->first();
        if ($order && $order->products()->where('product_id', $productId)->exists()) {
            return json_encode([
                'status' => 'error'
            ]);
        }

        if (!$order) {
            $order = new Orders();
            $order->user_id = $userId;
            $order->status = 0;
            $order->save();
        }

        $ordersProduct = new OrdersProducts();
        $ordersProduct->product_id = $productId;
        $ordersProduct->order_id = $order->id;
        $ordersProduct->save();

        return json_encode([
            'status' => 'success',
            'count_product' => (int)$order->products->count()
        ]);
    }
    public function deleteProduct(Request $request)
    {
        $order = Orders::where('user_id',auth()->user()->id)->where('status',0)->first();
        $productdelete = $order->products()->where('product_id',$request->id)->first();
        $productdelete->delete();
        $sumPrice = 0;
        foreach ($order->products as $product) {
            $price = $product->products->price;
            $sumPrice = $sumPrice + $price;
        }
        return json_encode([
            'test' => $productdelete->id,
            'count_product' => countsProducts() ,
            'sumPrice' => $sumPrice
        ]);
    }
    public function makingAnOrder(Request $request)
    {
        $order = Orders::where('user_id',auth()->user()->id)->where('status',0)->first();
        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->address =$request->address;
        $order->phone = $request->phone;
        $order->status = 1;
        $order->save();
        return redirect('/prodducts');
    }
}
