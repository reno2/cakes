<?php

namespace App\Providers;

use App\Models\Profile;
use App\Observers\ProfileObserver;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

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
        Carbon::setLocale(config('app.locale'));
        Date::setlocale(config('app.locale'));
        Profile::observe(ProfileObserver::class);
    }
}
