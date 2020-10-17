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

/*-------------------Web Site----------------------*/

Route::get('/','AuthController@home');

Route::get('register', 'AuthController@register');
Route::get('login', 'AuthController@login');
Route::get('profile', 'AuthController@profile')->middleware('authentication');

Route::get('play', 'AuthController@play');
Route::get('search', 'AuthController@search');



Route::get('show/{id}', 'AuthController@subcat_video');

Route::get('getArtists', 'artist@getArtists');
Route::get('artistDetail/{id}', 'artist@artistDetail');
//Route::get('artist-profile', 'artist@artistProfile');
Route::get('artist-video/{id}', 'artist@artistVideo');
Route::get('logout', 'AuthController@logout');
Route::get('cart', 'artist@cart');





Route::post('ajax-request', 'artist@cartSbmit');
Route::post('updateProfile', 'AuthController@updateProfile');
Route::post('registration', 'AuthController@UserRegistration');
Route::post('login', 'AuthController@postLogin');
Route::post('contentProvider', 'AuthController@contentProvider1');

Route::post('contentPostLogin', 'AuthController@contentPostLogin');
Route::post('postContent', 'AuthController@providerContent');

Route::post('artistPost', 'AuthController@artistPost');
Route::post('getVedio', 'AuthController@getVedio');

Route::post('postId', 
           [  'name' => 'postId', 
              'uses' => 'artist@getRespectedSubId'
           ]);

   /*-------------------End Web Site Route----------------------*/


 /*-----------------------  For Admin -------------------------------*/

  Route::get('admin/getCategory', 'admin@showCategorypage');

  Route::post('admin/addCategory', 'admin@addCategory');


  Route::get('admin/sub/{id}', 'admin@showSubCategory');

  Route::post('admin/addSub', 'admin@addSubCategory');

/*---------------------------End Admin-----------------------------*/

/*-------------------------------------Artist Route ---------------------------*/

     Route::get('withdraw', 'AuthController@withdraw');

    Route::get('artist/edit', 'AuthController@contentForm');

    Route::get('artistRegister', 'AuthController@artistRegister');

    Route::get('artistLogin', 'AuthController@getLogin');
    Route::get('artists/dashboard', 'artist@dashboard');

    Route::get('artist/Profile', 'artist@profile');

    Route::get('artist/contentUpload', 'AuthController@contentProv');


/*---------------------------------------End Artist---------------------*/

// Api routes


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
