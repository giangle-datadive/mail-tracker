<?php

namespace MailTracker\Providers;

use Illuminate\Support\ServiceProvider;

class MailTrackerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'mail_tracker');
        $this->publishes([
            __DIR__.'/../config/mail-tracker.php' => config_path('mail-tracker.php'),
            __DIR__.'/../assets' => public_path('vendor/mail-tracker'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
