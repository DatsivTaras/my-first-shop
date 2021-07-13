<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories =  Categories::all();
        return view('admin/categories/index',compact('categories'));

    }
    public function create()
    {

        return view('admin/categories/create');

    }
    public function destroy($id)
    {
        $categori = Categories::where('id',$id)->first();
        $categori->delete();
        return redirect('categories');
    }

    public function edit($id)
    {
        $categori = Categories::where('id',$id)->first();
        return view('admin/categories/edit',compact('categori'));
    }

    public function update(Request $request,$id)
    {

        $categori = Categories::find($id);
        $categori->fill($request->all());
        $categori->save();
        return redirect('categories');

    }

    public function store(Request $request)
    {

        $categories = new  Categories();
        $categories->fill($request->all());
        $categories->save();

        return redirect('categories');

    }

}


