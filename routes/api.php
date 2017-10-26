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

Route::get('posts', function () {
	return App\Post::all();
})->middleware('auth:api');

Route::get('clients/posts', function () {
	return App\Post::all();
})->middleware('client');

Route::post('clients/posts', function (Request $request) {
	App\Post::create([
		'title' => $request->input('title'),
		'body' => $request->input('body')
	]);

	return ['status' => 200];
})->middleware('client');
