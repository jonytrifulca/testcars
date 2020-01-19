<?php

namespace App\Providers;

use App\Repositories\CocheRepositoryJson;
use Illuminate\Support\ServiceProvider;

class CochesRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\CocheRepositoryInterface', 'App\Repositories\CocheRepositoryEloquent');
        /*$this->app->bind('App\Interfaces\CocheRepositoryInterface', function () {
            return new CocheRepositoryJson('coches.json');
        });*/
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
