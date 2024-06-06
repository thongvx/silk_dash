<?php

namespace App\Providers;

use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // You can add your Horizon related booting code here
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Horizon::auth(function ($request) {
            // return true / false . For example, you can use a specific user's id to give access to Horizon
            // return optional($request->user())->id === 1;
        });
    }

    /**
     * Configure the Horizon environments.
     *
     * @return void
     */
    protected function configureHorizon()
    {
        Horizon::night();

        // You can add your Horizon related configuration code here
    }
}
