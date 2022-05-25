<?php

namespace App\Providers;

use Closure;
use Illuminate\Support\ServiceProvider;
use App\Models\Festival;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        //

        $festival = Festival::find(1)->first();
        view()->share('festival' , $festival);
    }
}
