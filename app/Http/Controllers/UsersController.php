<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users',User::where('id','!=',7)->get()); 
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success','User Made Admin Successfully.');
        return redirect(route('users.index'));
    }

    public function edit(){
        return view('users.edit')->with('user',auth()->user());
    }

    public function update(UpdateProfileRequest $request){
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success','User Updated Successfully.');

        return redirect()->back();
    }
}
