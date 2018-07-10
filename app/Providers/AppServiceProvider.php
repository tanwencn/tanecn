<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tanwencn\Blog\Widgets\DashboardWidget;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Admin::dashboard(DashboardWidget::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
