<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        if(auth()->user()->isAdmin()):
            return view('admin.dashboard');
        endif;
        return redirect()->route('customer#myaccount');
        
    }

    public function signin(){
        if(Auth::check()):
            return redirect()->route('admin#dashboard');
        endif;
        return view('admin.signin');
    }

    public function signup(){
        return view('admin.signup');
    }
}
