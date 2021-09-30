<?php

//\Illuminate\Support\Facades\DB::listen(function ($query){ var_dump($query->sql,$query->bindings);});

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use \App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    Route::get('/tweets',[TweetController::class,'index'])->name('home');
    Route::post('/tweets',[TweetController::class,'store']);
});

Auth::routes();

Route::get('/profiles/{user:name}',[ProfileController::class,'show'])->name('profile');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
