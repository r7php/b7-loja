<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\models\State;
use App\Http\Requests\LoginRequest;
class Authcontroller extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function register_action(RegisterRequest $request ) {

        $data = $request->only(['name','email','password']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::loginUsingId($user->id);
        return redirect()->route('estado');
      //  dd($user);
    }



    public function estado(){
        $data['state'] = State::all();
        return view('auth.estado',$data);
    }

    public function select_state_action(Request $request){
        $data = $request->only(['state']);
        $stateRe = State::find($data['state']);
       // dd($stateRe);
        if(!$stateRe){
         return redirect('/login');
        }
        $user = Auth::user();
        $user->state_id = $stateRe->id;
        $user->save();
        return redirect()->route('home');


    }
    public function login_action(LoginRequest $request){



        $login_form = $request->only(['email','password']);
        if(Auth::attempt($login_form)){
           // $user = Auth::user();
            $data['message_erro'] ='';
            return redirect()->route('home');
           // dd($user);
        }else{
          $data['message_erro'] ='usuario nao existe';
          return view('auth.login',$data);
        }
    }

    public function logout(){
         Auth::logout();
         return redirect()->route('login');
    }

}
