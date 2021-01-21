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

/*----------------------------------------Web Site---------------------------------------------*/

Route::get('/','AuthController@home')->middleware('authentication');


Route::get('/register', 'AuthController@register');

Route::get('checkUser/{user}', 'AuthController@check');

Route::get('addToken', 'AuthController@addtoken');

Route::get('login', 'AuthController@login');

Route::get('profile', 'AuthController@profile')->middleware('authentication');

Route::get('play', 'AuthController@play')->middleware('authentication');

Route::get('listname', 'AuthController@listname')->middleware('authentication');

Route::get('search', 'AuthController@search')->middleware('authentication');

Route::get('userWithdraw', 'AuthController@draw')->middleware('authentication');

Route::get('show/{id}', 'AuthController@subcat_video');

Route::get('verify/{id}/{type}', 'AuthController@verifyEmail');

Route::get('stripe', array('as' => 'stripe.stripe','uses' => 'AuthController@payWithStripe'));

Route::post('addmoney/stripe', 'AuthController@postPaymentStripe');

Route::get('getArtists', 'artist@getArtists')->middleware('authentication');

Route::get('artistDetail/{id}', 'artist@artistDetail');

//Route::get('artist-profile', 'artist@artistProfile');

Route::get('artist-video/{id}', 'artist@artistVideo');

Route::get('logout', 'AuthController@logout'); 

Route::get('view1', 'AuthController@view1'); 

Route::get('paymentSuccess', 'AuthController@success'); 

Route::get('my-requests','AuthController@myRequests')->middleware('authentication');;

Route::get('success', 'AuthController@succssPage'); 

Route::get('notify/{id}', 'AuthController@notify')->middleware('authentication');; 

Route::get('inProcess', 'AuthController@process'); 

Route::get('seeall/{text}', 'AuthController@seeall'); 
Route::get('playlist/{id}', 'AuthController@playlistByid'); 

Route::get('reset', 'AuthController@reset'); 

Route::get('new', 'AuthController@new'); 

Route::get('artistselling', 'AuthController@artistselling'); 

//Route::get('artistoffers', 'AuthController@artistoffers'); 

Route::get('artistprofilepage', 'AuthController@artistprofilepage'); 

Route::get('cart', 'artist@cart')->middleware('authentication');

//Route::get()

Route::get('showoffers','AuthController@offers')->middleware('authentication');

Route::get('notification/{text}','AuthController@seeNotification');

Route::post('ajax-request', 'artist@cartSbmit');

Route::post('subscribe','artist@subscribe');

Route::post('resetPassword','AuthController@resetPassword');

Route::post('selectListname', 'AuthController@selectListname');

Route::post('readNotification','AuthController@readNotification');

Route::post('notifyEmail', 'AuthController@notifyEmail');

Route::post('request', 'AuthController@addRequest');

Route::post('passwordReset', 'AuthController@passwordReset');

Route::post('addToLibrary', 'AuthController@addToLibrary');

Route::post('checknameExist', 'AuthController@checknameExist');

Route::post('addMultipleVideo', 'AuthController@addMultipleVideo');

Route::post('selectMultiple', 'AuthController@selectMultiple');

Route::post('updateProfile', 'AuthController@updateProfile');

Route::post('addmMltiple', 'AuthController@addmMltiple');

Route::post('showOffer','AuthController@showOffer');

Route::post('editDescription','AuthController@editDescription');

Route::post('registration', 'AuthController@UserRegistration');

Route::post('login', 'AuthController@postLogin');

Route::post('showLists', 'AuthController@showLists');

Route::post('addToWish', 'AuthController@addToWish');

Route::get('artistoffers/{id}', 'AuthController@artistoffers');

//Route::post('checkPrice', 'AuthController@checkPrice');

Route::post('contentProvider', 'AuthController@contentProvider1');

Route::post('contentPostLogin', 'AuthController@contentPostLogin');

Route::post('postContent', 'AuthController@providerContent');

Route::post('artistPost', 'AuthController@artistPost');

Route::post('getVedio', 'AuthController@getVedio');

Route::post('addTohistory', 'AuthController@addTohistory');

Route::post('getSelectingArtist','AuthController@getSelectingArtist');

Route::post('postId', 
           [  'name' => 'postId', 
              'uses' => 'artist@getRespectedSubId'
           ]);

Route::post('checkprice', 'AuthController@price');

Route::post('orderVideo', 'AuthController@orderVideo');

Route::post('updateStatus', 'AuthController@updateStatus');

Route::post('createList', 'AuthController@createList');

   /*-------------------End Web Site Route----------------------*/


 /*-----------------------  For Admin -------------------------------*/

   Route::get('admin/getCategory', 'admin@showCategorypage');

   Route::post('admin/addCategory', 'admin@addCategory');

   Route::get('admin/sub/{id}', 'admin@showSubCategory');

   Route::post('admin/addSub', 'admin@addSubCategory');

/*---------------------------End Admin-----------------------------*/

/*-----------------------------------------------Artist Route ----------------------------------*/

     Route::get('withdraw', 'AuthController@withdraw')->middleware('contentAuth');

    Route::get('artist/edit', 'AuthController@contentForm')->middleware('contentAuth');

    Route::get('artistRegister', 'AuthController@artistRegister');
    Route::get('artist/offers/{id}', 'artist@offerpage');

    Route::get('artist/offer', 'artist@offer');

    Route::get('artist/my-offer', 'artist@myoffer');

    Route::get('artist/requests', 'artist@showRequest')->middleware('contentAuth');

    Route::get('artist/notification','artist@ShowArtistNotification');

    Route::get('artistLogin', 'AuthController@getLogin');

    Route::get('artists/dashboard', 'artist@dashboard')->middleware('contentAuth');

    Route::get('artist/Profile', 'artist@profile')->middleware('contentAuth');

    Route::get('artist/contentUpload', 'AuthController@contentProv')->middleware('contentAuth');

    Route::post('addDescription','artist@addDescription');
    
    Route::post('createOffer','artist@createOffer');

    Route::post('createPlaylist','artist@createPlaylist');

    Route::post('editOffer','artist@editOffer');

    Route::post('change_image','artist@change_image');

    Route::post('postDescription','artist@addUserDescription');

    Route::post('edit_offer','artist@edit_offer');

    Route::post('editDescription','artist@editDescription');

/*---------------------------------------End Artist---------------------*/

// Api routes

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
