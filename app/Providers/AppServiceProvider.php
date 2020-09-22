<?php

namespace App\Providers;

use App\Application;
use App\Person;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

//        $person = Person::all();
//        $applications = Application::all();
//        view()->share('applications', $applications, 'person',$person);
    }
}
