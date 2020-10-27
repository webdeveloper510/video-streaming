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

            $data=Session::get('User');

            $userId = isset($data) ? $data->id : '';

            $tokens = $model->getUserData($userId);

           // $profile = $model->getUserProfile($userId);

            //$type=Session::get('userType');

            $view->with(array('login'=>$data, 'category'=>$category,  'userProfile'=>$tokens));    
    }); 

    }
}
