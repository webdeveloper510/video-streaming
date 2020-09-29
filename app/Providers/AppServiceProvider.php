<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

/**
 * Bootstrap any application services.
 *
 * @return void
 */

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
<<<<<<< HEAD
	{
	    Schema::defaultStringLength(191);
	}

=======
    {
        //
        //Schema::defaultStringLength(191);
    }
>>>>>>> a96164d4bbad8182ea99c0e52ddfc3177cc99f71
}
