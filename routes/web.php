<?php

//\Illuminate\Support\Facades\DB::listen(function ($query){ var_dump($query->sql,$query->bindings);});

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\FollowsController;
use \App\Http\Controllers\ExploreController;

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

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetController::class, 'store']);
    Route::post('/profiles/{user:username}/follow', [FollowsController::class, 'store'])->name('follow.store');
    Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->middleware('can:edit,user')->name('profile.edit');
    Route::patch('/profiles/{user:username}/update', [ProfileController::class, 'update'])->middleware('can:edit,user')->name('profile.update');
    Route::get('/explore', ExploreController::class)->name('explore');
});

Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profile');

Auth::routes();

Route::get('/logout',function (){
   auth()->logout();
   return redirect()->route('login');
});