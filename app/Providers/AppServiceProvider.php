<?php

namespace App\Providers;

use App\Models\Reply;
use App\Models\Topic;
use App\Observers\ReplyObserver;
use App\Observers\TopicObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;

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
        Paginator::useBootstrap();
        Topic::observe(TopicObserver::class);
        Reply::observe(ReplyObserver::class);

        Horizon::auth(function ($request) {
            // 是否是站长
            return Auth::user()->hasRole('Founder');
        });
    }
}
