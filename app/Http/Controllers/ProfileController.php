<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id',auth()->user()->id)->first();
        return view('profile/profile',compact('user'));
    }
    public function edit()
    {
        $user = User::where('id',auth()->user()->id)->first();
        return view('profile/edit',compact('user'));
    }
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->fill($request->all());
        $user->surname = 'Даців';
        $user->save();
        return redirect('/profile');
    }

}
