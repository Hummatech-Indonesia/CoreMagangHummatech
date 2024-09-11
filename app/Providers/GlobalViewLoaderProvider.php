<?php

namespace App\Providers;

use App\Models\Division;
use App\Models\Institution;
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
        $divisions = Division::all();
        $institutions = Institution::all();
        view()->share('divisions', $divisions);
        view()->share('institutions', $institutions);
    }
}
