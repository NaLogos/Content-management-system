<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ImpersonateController extends Controller
{
    public function index($id){
        $user = User::where('id',$id)->firstOrFail();

        if($user){
            session()->put('impersonate',$user->id);
        }

        return redirect('home');
    }


    public function destroy(){
        session()->forget('impersonate');
        return redirect('home');
    }
}
