<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('home');
});
Route::view('login', 'login-form');
Route::post('loginSubmit', 'userCheck@index');

//Route::get('profile', 'userCheck@redirectProfile');
Route::get('/logout', function () {
    /*session()->forget('name');
    session()->flash('error', 'Logout Successful');
    return redirect('login');*/
    Auth::logout();

    session()->invalidate();

    session()->regenerateToken();
    session()->flash('success', 'Logout Successful');

    return redirect('/login');
});
Route::group(['middleware' => ['userAuth']], function () {
    Route::get('profileDashboard', 'userCheck@redirectProfile');
});
Route::get('register', 'ProfileController@create');
Route::post('registerSubmit', 'ProfileController@store');
