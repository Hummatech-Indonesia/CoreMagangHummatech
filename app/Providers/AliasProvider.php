<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AliasProvider extends ServiceProvider
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
        AliasLoader::getInstance([
            'Transaction' => \App\Helpers\TransactionHelper::class,
            'Cart' => \App\Helpers\CartHelper::class,
        ]);
    }
}
