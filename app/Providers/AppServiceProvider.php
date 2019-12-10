<?php
/*
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
 /*   public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
 /*   public function register()
    {
        //
    }
}

<?php
 */
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
 use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input; 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
                        Validator::extend('empty_when', function ($attribute,$value, $parameters)
                {
                    foreach ($parameters as $key)
                    {
                        if ( ! empty(Input::get($key))&& ! empty($value) )
                        {
                            return false;
                        }
                    }

                    return true;
                });
    }
 
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}