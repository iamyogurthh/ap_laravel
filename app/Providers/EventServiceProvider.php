<?php

namespace App\Providers;

use App\Events\PostCreatedEvnet;
use App\Listeners\PostCreatedEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $listen = [
        PostCreatedEvnet::class => [
            PostCreatedEventListener::class
        ]
    ];
}
