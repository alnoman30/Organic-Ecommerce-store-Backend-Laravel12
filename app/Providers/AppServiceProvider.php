<?php

namespace App\Providers;

use App\Models\ContactMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('layouts.panel', function ($view) {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $view->with('unreadCount', $unreadCount);
        });
    }
    
}
