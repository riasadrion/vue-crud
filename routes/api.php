<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::resource('posts', 'PostsController');

// List posts
Route::get('posts', 'PostsController@index');

// List single post
Route::get('post/{id}', 'PostsController@show');

// Create new post
Route::post('post', 'PostsController@store');

// Update post
Route::put('post', 'PostsController@store');

// Delete post
Route::delete('post/{id}', 'PostsController@destroy');

