<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;

Route::get('/', function () {
    $data['categories']=[];
    $data['states']=[];

    return view('home',$data);
})->name('home');


Route::get('/register', [Authcontroller::class,'register'])->name('register');
Route::post('/register_action', [Authcontroller::class,'register_action'])->name('register_action');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');

// Route::get('/select-state', function () {
//     return view('auth.select-state');
// })->name('select-state');



 Route::get('/estado',[Authcontroller::class,'estado'])->name('estado');



Route::post('/select-states',[Authcontroller::class,'select_state_action'])->name('select_state_action');
Route::post('/login_action',[Authcontroller::class,'login_action'])->name('login_action');
