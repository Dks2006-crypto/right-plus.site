<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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



        Livewire::component('application-modal', \App\Livewire\ApplicationModal::class);
        //
			$this->loadViewsFrom(base_path('resources/views/website/team'), 'team');
	}
}
