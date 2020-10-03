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
Route::get('home', 'AuthController@home');
Route::get('contact', 'AuthController@contact');
Route::get('play', 'AuthController@play');
Route::get('search', 'AuthController@search');
Route::get('upload', 'AuthController@upload');
Route::get('playlist', 'AuthController@playlist');
Route::get('withdraw', 'AuthController@withdraw');
Route::get('contentProvider', 'AuthController@contentProv');


/*-----------------------  For Admin -------------------------------*/

Route::get('admin/getCategory', 'admin@showCategorypage');

Route::post('admin/addCategory', 'admin@addCategory');


Route::get('admin/sub/{id}', 'admin@showSubCategory');

Route::post('admin/addSub', 'admin@addSubCategory');

/*---------------------------End Admin-----------------------------*/

// Api routes
Route::post('updateProfile', 'AuthController@updateProfile');
Route::post('registration', 'AuthController@UserRegistration');
Route::post('login', 'AuthController@postLogin');
Route::post('contentProvider', 'AuthController@contentProvider1');
Route::get('logout/{args?}', 'AuthController@logout');
Route::post('contentPostLogin', 'AuthController@contentPostLogin');
Route::post('Dashboard', 'AuthController@Postdashboard');
Route::post('postContent', 'AuthController@providerContent');

Route::post('getVedio', 'AuthController@getVedio');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
