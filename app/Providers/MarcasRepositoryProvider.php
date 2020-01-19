<?php

namespace App\Providers;

use App\Repositories\MarcaRepositoryJson;
use Illuminate\Support\ServiceProvider;

class MarcasRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\MarcaRepositoryInterface', 'App\Repositories\MarcaRepositoryEloquent');
       /* $this->app->bind('App\Interfaces\MarcaRepositoryInterface', function () {
            return new MarcaRepositoryJson('marcas.json');
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
