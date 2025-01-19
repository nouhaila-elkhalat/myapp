<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Formulaire;
use App\Observers\FormulaireObserver;

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
        Formulaire::observe(FormulaireObserver::class);
    }
}
