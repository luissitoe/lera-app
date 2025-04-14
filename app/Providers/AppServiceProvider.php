<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Livro;
use App\Observers\LivroObserver;

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
        Livro::observe(LivroObserver::class);
    }
}
