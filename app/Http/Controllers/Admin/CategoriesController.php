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
    public function destroy() 
    {
        echo 'gf';
    }

    public function show() 
    {

      echo 'show';

    }
    public function store(Request $request) 
    {
        
        $categories = new  Categories();
        $categories->fill($request->all());
        $categories->save();
        
        return redirect('categories');

    }
   
}


