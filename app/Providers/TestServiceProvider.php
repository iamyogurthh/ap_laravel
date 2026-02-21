<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Test;
use Illuminate\Support\Facades\Auth;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('test', function () {
            return new Test(Auth::user()->name);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}