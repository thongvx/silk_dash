<?php

namespace App\Providers;

use App\Services\TelegramService;
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
        $this->app->singleton('bot', function ($app) {
            return new TelegramService();
        });
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
