<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Repositories\NotificationRepo;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(NotificationRepo $notificationRepo)
    {
        View::composer('dashboard.components.navbar', function ($view) use ($notificationRepo) {
            if (Auth::check()) {
                $notifications = $notificationRepo->getAllNotifications(Auth::user()->id);
                $view->with('notifications', $notifications);
            }
        });
    }
}
