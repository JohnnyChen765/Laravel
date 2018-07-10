<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class welcomeController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect()->route('showList');
        }
        else{
            return view('auth/login');
        }
    }
}
