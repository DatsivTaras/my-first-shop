<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Orders;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request ,$id='')
    {
        $query = Products::where('category_id', $id);

        if (!empty($request->input('search'))) {
            $query->where('name','LIKE', '%'.$request->input('search').'%');
        }

        if (!empty($request['filtering']) && $request['filtering'] == 1 ) {
            $query->orderBy('price', 'desc');
        }

        if (!empty($request->input('filtering')) && $request->input('filtering') == 2 ) {
            $query->orderBy('price', 'asc');
        }

        if (!empty($request->input('filtering')) && $request->input('filtering') == 3 ) {
            $query->orderBy('created_at', 'desc');
        }
        $products = $query->paginate(15);
        $categories = Categories::all();

        $valueSelect = $request->input('filtering');
        $valueSearch = $request->input('search');

        if (empty($id)) {
            $products = Products::orderBy('created_at','desc')->paginate(21);
        }
        return view('index',compact('products','categories','valueSearch','valueSelect','id'));

    }
}
