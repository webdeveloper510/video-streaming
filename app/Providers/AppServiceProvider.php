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

             $id = Session::get('offer_artist_id');


             $offer = $model->getallOffers($id);

              $library = $model->libraryNotification();

            $tokens = $model->getUserData($userId);

             $artistData = $model->onlyArtistDetail($userId);

             $subscribed_artist = $model->showSubscribeArtists();
      
       
             $getLevel= isset($data) ? $model->getlevel(): '';
             
              $percentage = $getLevel ? ($getLevel[0]->countsubscriber * 100)/$getLevel[0]->max:[];


            $view->with(array('addedLibrary'=>$library,'subscribed_artist'=>$subscribed_artist,'latestOffer'=>$offer,'levelData'=>$getLevel,'percentage'=>$percentage,'login'=>$data,'count'=>$count,'notification'=>$notification,'category'=>$category, 'userProfile'=>$tokens, 'artistProfile'=>$artistData));    
    }); 

    }
}
