<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [Authcontroller::class,'register'])->name('register');
Route::post('/register_action', [Authcontroller::class,'register_action'])->name('register_action');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');
