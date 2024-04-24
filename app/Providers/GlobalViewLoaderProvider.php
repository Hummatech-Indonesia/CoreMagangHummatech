<?php

namespace App\Providers;

use App\Models\ZoomSchedule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalViewLoaderProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $zoomData = ZoomSchedule::latest()->limit(5)->get();
        View::share("zoomSchedule", $zoomData);
    }
}
