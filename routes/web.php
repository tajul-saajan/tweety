<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/tweets', 'App\Http\Controllers\TweetController@store');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $tweets = auth()->user()->timeline();
    return view('dashboard', compact('tweets'));
})->name('dashboard');


Route::get('/profile/{user:username}',
    'App\Http\Controllers\ProfilesController@show')
    ->name('profile');


Route::middleware('auth')->group(function () {

    Route::post('/profile/{user:username}/follow',
        'App\Http\Controllers\FollowsController@store');


    Route::get('profile/{user:username}/edit', "App\Http\Controllers\ProfilesController@edit")
        ->middleware('can:edit,user');

    Route::patch('/profile/{user:username}', 'App\Http\Controllers\ProfilesController@update')
        ->name('profile_update');

    Route::get('explore',"App\Http\Controllers\ExploreController@index");
});






