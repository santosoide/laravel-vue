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

Route::resource('users', 'Api\UserController')->except(['create', 'edit']);
Route::resource('channels', 'Api\ChannelController')->except(['create', 'edit']);
Route::resource('roles', 'Api\RoleController')->except(['create', 'edit']);
Route::resource('customers', 'Api\CustomerController')->except(['create', 'edit']);
Route::resource('subscribers', 'Api\SubscriberController')->except(['create', 'edit']);
