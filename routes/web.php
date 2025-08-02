<?php

use App\Http\Controllers\AdCcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\AdController;
use App\Http\Controllers\DeleteController;
use App\http\Controllers\PayController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::middleware(['auth'])->group(function(){
    Route::get('/charge', function () {
         return view('charge');
    });
    Route::get('/', function () {
        $data['categories']=[];
        $data['states']=[];

        return view('home',$data);
    })->name('home');
    Route::get('/ad/{slug}',[AdController::class,'show'])->name('ad.show');
    Route::get('/estado',[Authcontroller::class,'estado'])->name('estado');

    Route::post('/select-states',[Authcontroller::class,'select_state_action'])->name('select_state_action');

    Route::get('/dashboard/my-account',[Dashboardcontroller::class,'my_account'])->name('my_account');

    Route::post('/dashbord/my_account_action',[Dashboardcontroller::class,'my_account_action'])->name('my_account_action');

    Route::get('/my_ads',[Dashboardcontroller::class,'my_ads'])->name('my_ads');

    Route::get('/dashbord/ad/dekete/{id}',[DeleteController::class,'delete'])->name('delete');
    Route::get("/csv", [Dashboardcontroller::class,'csvPage'])->name('csvPage');
    Route::post("/upload", [Dashboardcontroller::class,'upload'])->name('upload');

    Route::post('/processar-pagamento', [PayController::class, 'processar']);

    Route::get('/pagamento-sucesso', function () {
        return view('pagamento-sucesso');
    })->name('pagamento.sucesso');
    Route::view('/pagamento-cancelado', 'pagamento-cancelado')->name('pagamento.cancelado');


    Route::get('/checkout', [PayController::class, 'index'])->name('checkout');

    // Essa rota PRECISA existir:
    Route::post('/criar-sessao', [PayController::class, 'createSession'])->name('checkout.session');

    //Route::get('/criar-sessao', [PayController::class, 'createSession'])->name('checkout.session');



});


/*REGISTROS */

Route::get('/register', [Authcontroller::class,'register'])->name('register');
Route::post('/register_action', [Authcontroller::class,'register_action'])->name('register_action');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');



Route::post('/login_action',[Authcontroller::class,'login_action'])->name('login_action');


Route::get('/logout',[Authcontroller::class,'logout'])->name('logout');
