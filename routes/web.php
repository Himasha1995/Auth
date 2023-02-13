<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\Auth\ProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home Controller
Route::get('/', function () {
    return view('welcome');
});

//Authentication
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//provider Controller Route

Route::get('/auth/{provider}/redirect', [App\Http\Controllers\Auth\ProviderController::class, 'redirect' ]);
 
Route::get('/auth/{provider}/callback',  [App\Http\Controllers\Auth\ProviderController::class, 'callback']);
 

