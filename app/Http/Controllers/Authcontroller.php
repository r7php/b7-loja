<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function register_action(RegisterRequest $request ) {
       dd($request);
    }
}
