<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $products =  Products::all();
        return view('admin/products/index',compact('products'));
    }

public function create()
{
    $categories = Categories::all();

    return view('admin/products/create',compact('categories'));
}

public function store(Request $request)
{
    $products = new  Products();
    $products->fill($request->all());
    $products->save();
    return redirect('/products');
}

public function destroy($id)
{
    $product = Products::where('id',$id)->first();
    $product->delete();
   return redirect('/products');
}

public function edit($id)
{
    $categories = Categories::all();
    $product = Products::where('id',$id)->first();
    return view('admin/products/edit', compact('product','categories'));
}

public function update(Request $request, $id)
{
    $product = Products::find($id);
    $product->fill($request->all());
    $product->save();
    return redirect('/products');


}


}
