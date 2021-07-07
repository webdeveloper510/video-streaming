<?php

use Illuminate\Support\Facades\Route;

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

// use Illuminate\Routing\Route;

// Route::controller(Controller::detect());

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


Route::get('overview','AuthController@overview');


Route::get('addToken', 'AuthController@addtoken');

Route::get('disclaimer', 'AuthController@disclaimer');

Route::get('privacy', 'AuthController@privacy');

Route::get('dmca', 'AuthController@dmca');

Route::get('cookie', 'AuthController@cookie');

Route::get('acceptable', 'AuthController@acceptable');

Route::get('terms', 'AuthController@terms');

Route::get('accept', 'AuthController@accept');

Route::get('showArtist','AuthController@artistPage');

Route::get('/login', 'AuthController@login');

Route::get('profile', 'AuthController@profile')->middleware('authentication');


Route::get('listname', 'AuthController@listname')->middleware('authentication');

Route::get('search', 'AuthController@search')->middleware('authentication');

Route::get('userWithdraw', 'AuthController@draw')->middleware('authentication');



Route::get('stripe', array('as' => 'stripe.stripe','uses' => 'AuthController@payWithStripe'));

Route::post('addmoney/stripe', 'AuthController@postPaymentStripe');

Route::get('getArtists', 'artist@getArtists')->middleware('authentication');




Route::get('view1', 'AuthController@view1'); 

Route::get('paymentSuccess', 'AuthController@success'); 

Route::get('my-requests','AuthController@myRequests')->middleware('authentication');;

Route::get('success', 'AuthController@succssPage'); 


Route::get('admin-panel', 'AuthController@adminPanel'); 

Route::get('inProcess', 'AuthController@process'); 



Route::get('reset', 'AuthController@reset'); 

Route::get('new', 'AuthController@new'); 

Route::get('artistselling', 'AuthController@artistselling'); 


Route::get('Social-Media-Download', 'artist@showSocialMedia');

//Route::get('artistoffers', 'AuthController@artistoffers'); 

Route::get('artistprofilepage', 'AuthController@artistprofilepage'); 

Route::get('cart', 'artist@cart')->middleware('authentication');

//Route::get()

Route::get('showoffers','AuthController@offers')->middleware('authentication');


Route::post('ajax-request', 'artist@cartSbmit');

Route::post('libraryAdded', 'AuthController@addInLibrary');

Route::post('updatedCancelStatus','AuthController@CancelStatus');


Route::post('subscribe','artist@subscribe');

Route::post('notifyTrans','AuthController@notifyUrl');
  
Route::post('report','AuthController@reportVideo');

Route::post('personal_info','AuthController@personal_info');

Route::post('resetPassword','AuthController@resetPassword');

Route::post('popupClose','AuthController@popupClose');

Route::post('deletePlaylist', 'AuthController@deletePlaylist1');


Route::post('selectListname', 'AuthController@selectListname');

Route::post('readNotification','AuthController@readNotification');

Route::post('notifyEmail', 'AuthController@notifyEmail');

Route::post('request', 'AuthController@addRequest');

Route::post('update_Status', 'AuthController@update_due_Status');

Route::post('editPlaylist', 'AuthController@editPlaylist');

Route::post('duration', 'AuthController@duration');

Route::post('deleteName', 'artist@deleteUsername');


Route::post('passwordReset', 'AuthController@passwordReset');

Route::post('addToLibrary', 'AuthController@addToLibrary');

Route::post('checknameExist', 'AuthController@checknameExist');
Route::post('checktitleExist', 'AuthController@checktitleExist');

Route::post('addMultipleVideo', 'AuthController@addMultipleVideo');

Route::post('selectMultiple', 'AuthController@selectMultiple');

Route::post('updateProfile', 'AuthController@updateProfile');

Route::post('addmMltiple', 'AuthController@addmMltiple');

Route::post('showOffer','AuthController@showOffer');

Route::post('customer_issue','AuthController@technical_issue');

Route::post('editDescription','AuthController@editDescription');

Route::post('registration', 'AuthController@UserRegistration');

Route::post('login', 'AuthController@postLogin');

Route::post('showLists', 'AuthController@showLists');

Route::post('addToWish', 'AuthController@addToWish');


//Route::post('checkPrice', 'AuthController@checkPrice');

Route::post('contentProvider', 'AuthController@contentProvider1');

Route::post('contentPostLogin', 'AuthController@contentPostLogin');
Route::post('removeBadge', 'AuthController@updateNoti');

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

Route::post('isVerifiedOrNot','AuthController@isVerifyOrNot');

Route::post('islegelOrNot','AuthController@islegelOrNot');

Route::post('verifyVideo','AuthController@verifyMedia');
Route::post('paz','AuthController@pazLogin');

Route::post('createList', 'AuthController@createList');

Route::get('paz-Team-Login', 'AuthController@supportlogin');

Route::get('Content-review', 'AuthController@report_media')->middleware('pazAuth');
Route::get('legal-notice', 'AuthController@legal');

   /*-------------------End Web Site Route----------------------*/


 /*-----------------------  For Admin -------------------------------*/

   Route::get('admin/getCategory', 'admin@showCategorypage');

   Route::post('admin/addCategory', 'admin@addCategory');


   Route::post('admin/addSub', 'admin@addSubCategory');

   
/*-------------------------------------------------------End Admin----------------------------------------------------*/

/*---------------------------------------------------------------------------Artist Route -------------------------------------------------------*/

                     Route::post('addDescription','artist@addDescription');

                     Route::post('userName','artist@saveUsername');

                     Route::post('sendToTip','artist@sendTip');

                     Route::post('insertTime','artist@sendTimeFrame');

                     // Route::post('cancelOrder','artist@CnacelOrder');
                     
                     Route::post('createOffer','artist@createOffer');

                     Route::post('createPlaylist','artist@createPlaylist');

                     Route::post('deleiver','artist@deleiverOffer');

                     Route::post('uploadSocialdashboard','artist@socialUpload');

                     Route::post('updateArtist','artist@updateartist');

                     Route::post('editOffer','artist@editOffer');

                     Route::post('draw_money','artist@draw_money');

                     Route::post('artist/editVedio','artist@editVideoInfo');

                     Route::post('artist/insert_support','artist@insertData');

                     Route::post('delete_offer','artist@deleteOfer');

                     Route::post('change_image','artist@change_image');

                     Route::post('postDescription','artist@addUserDescription');

                     Route::post('edit_offer','artist@edit_offer');

                     Route::post('edit_info','artist@edit_info');

                     Route::post('editDescription','artist@editDescription');

                     Route::get('artist/age-verification', 'artist@ageVerify');

                     Route::get('artist/contentUpload', 'AuthController@contentProv')->middleware('contentAuth');

                    Route::get('artist/earning', 'artist@earning');

                    Route::get('artist/edit', 'AuthController@contentForm')->middleware('contentAuth');


                  //Route::get('artists/dashboard', array('as' => 'Loguearse', 'uses' => 'artist@dashboard1'));

               //    Route::get('artists/dashboard', function () {
               //       dd('success');
               //   });



                  Route::get('withdraw', 'AuthController@withdraw')->middleware('contentAuth');


                     Route::get('artistRegister', 'AuthController@artistRegister');

                     Route::get('artist/support', 'artist@support');

                     Route::get('support-team', 'AuthController@support_team');

                     Route::get('artist/offer', 'artist@offer');
                     
                     Route::get('artist/faq', 'artist@faq');
                     
                     Route::get('artists/dashboard', 'artist@dashboard')->middleware('contentAuth');


                     Route::get('artist/feed', 'artist@feed');


                     Route::get('artist/my-offer', 'artist@myoffer');

                     // Route::get('artist/getOrdersRequests', 'artist@showOrdersRequest')->middleware('contentAuth');

                     Route::get('artist/notification','artist@ShowArtistNotification');

                     Route::get('artistLogin', 'AuthController@getLogin');

                     Route::get('feed', 'AuthController@feedPage');

                     Route::get('artist/offers/{id}', 'artist@offerpage');

                     Route::get('show/{id}', 'AuthController@subcat_video');


                     Route::get('/register/{id?}', 'AuthController@register');

                     Route::get('checkUser/{user}', 'AuthController@check');
                     
                     Route::get('showContent/{text}', 'AuthController@contentReview');

                     Route::get('verify/{id}/{type}', 'AuthController@verifyEmail');

                     Route::get('artistVideo/{id}','artist@VideoPage');

                     Route::get('play/{id?}', 'AuthController@play')->middleware('authentication');

                     Route::get('admin/sub/{id}', 'admin@showSubCategory');

                     Route::get('artistDetail/{id}', 'artist@artistDetail')->middleware('authentication');

                     Route::get('artist-video/{id}', 'artist@artistVideo');

                     Route::get('notification/{text}','AuthController@seeNotification');

                     Route::get('logout/{user?}', 'AuthController@logout'); 

                     Route::get('seeall/{text}', 'AuthController@seeall')->middleware('authentication');

                     Route::get('seeall1/{text}', 'AuthController@seeOrder')->middleware('authentication');

                     Route::get('playlist/{id}', 'AuthController@playlistByid'); 

                     Route::get('customer_orders/{text}', 'AuthController@getRequests');

                     Route::get('notify/{id}', 'AuthController@notify'); 

                     Route::get('artist/requests/{requests?}', 'artist@showRequest')->middleware('contentAuth');

                     Route::get('artist/Profile/{Profile?}', 'artist@profile')->middleware('contentAuth');
                     Route::get('artistoffers/{id}', 'AuthController@artistoffers');

                     Route::get('artist/getRequests/{getRequests}/{status?}', 'artist@getRequests')->middleware('contentAuth');

/*---------------------------------------------------------------End Artist--------------------------------------------------*/

// Api routes

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
