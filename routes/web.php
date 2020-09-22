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

Route::get('register', 'AuthController@register');
Route::get('login', 'AuthController@login');
Route::get('profile', 'AuthController@profile')->middleware('authentication');
Route::get('getContent', 'AuthController@contentForm');
Route::get('getProviderdata', 'AuthController@getProvider');
Route::get('getLogin', 'AuthController@getLogin');
Route::get('Dashboard', 'AuthController@Dashboard');
Route::get('contentProvider', 'AuthController@contentProv')->middleware('authentication');




// Api routes
Route::post('updateProfile', 'AuthController@updateProfile');
Route::post('registration', 'AuthController@UserRegistration');
Route::post('login', 'AuthController@postLogin');
Route::post('contentProvider', 'AuthController@contentProvider1');
Route::get('logout/{args?}', 'AuthController@logout');
Route::post('contentPostLogin', 'AuthController@contentPostLogin');
Route::post('Dashboard', 'AuthController@Postdashboard');
Route::post('postContent', 'AuthController@providerContent');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
