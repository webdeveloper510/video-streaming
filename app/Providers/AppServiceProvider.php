<?php

namespace App\Providers;
use Schema;
use Illuminate\Support\ServiceProvider;
use App\Registration;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
        error_reporting(0);

        view()->composer('*', function ($view) 
    {
             $model = new Registration();

            $category = $model->getCategory();
         
             $array = $model->getNotification();

             $notification = $array['notifications'];

              $count = $array['count'];


               $data=Session::get('User');

               $isActive = true;

             $userId = isset($data) ? $data->id : '';


             $offer = $model->getallOffers();

              Session::put('offer_artist_id',$offer->id);

            $tokens = $model->getUserData($userId);

             $artistData = $model->onlyArtistDetail($userId);

             $subscribed_artist = $model->showSubscribeArtists();
      
       
             $getLevel= isset($data) ? $model->getlevel(): '';

            // print_r($getLevel);
             
              $percentage = $getLevel ? ($getLevel[0]->countsubscriber * 100)/$getLevel[0]->max:[];  
              //print_r($percentage);      die;    

            $view->with(array('subscribed_artist'=>$subscribed_artist,'latestOffer'=>$offer,'levelData'=>$getLevel,'percentage'=>$percentage,'login'=>$data,'count'=>$count,'notification'=>$notification,'category'=>$category, 'userProfile'=>$tokens, 'artistProfile'=>$artistData));    
    }); 

    }
}
