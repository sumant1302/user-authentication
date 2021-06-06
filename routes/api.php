<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post("register", "UserController@createUser");

Route::post("login", "UserController@userLogin");


Route::group(['middleware' => 'auth:api'], function () {


    Route::post("todo/add", "TaskController@addTask");

    Route::post("todo/status", "TaskController@updateTask");


    Route::get("user-detail", "UserController@userDetail");

    Route::get("tasks", "TaskController@tasks");
});
