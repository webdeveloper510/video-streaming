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
      

        view()->composer('*', function ($view) 
    {
             $model = new Registration();

            $category = $model->getCategory();
         
             $array = $model->getNotification();

             $notification = $array['notifications'];

                $count = $array['count'];


            $data=Session::get('User');

             $userId = isset($data) ? $data->id : '';

            $tokens = $model->getUserData($userId);

             $artistData = $model->onlyArtistDetail($userId);
       
             $getLevel= isset($data) ? $model->getlevel(): '';
             // print_r($getLevel);die;
             
              $percentage = $getLevel ? ($getLevel[0]->countsubscriber * 100)/$getLevel[0]->max:[];
            

            //echo $tokens ? 'yes' : 'No';

           // print_r($tokens);die;

           // $profile = $model->getUserProfile($userId);

            //$type=Session::get('userType');

            $view->with(array('levelData'=>$getLevel,'percentage'=>$percentage,'login'=>$data,'count'=>$count,'notification'=>$notification,'category'=>$category, 'userProfile'=>$tokens, 'artistProfile'=>$artistData));    
    }); 

    }
}
