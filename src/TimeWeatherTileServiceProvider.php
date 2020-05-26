<?php

namespace Brmo\TimeWeatherTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Brmo\TimeWeatherTile\Commands\FetchOpenWeatherMapDataCommand;

class TimeWeatherTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Livewire::component('time-weather-tile', TimeWeatherTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchOpenWeatherMapDataCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-time-weather-tile'),
        ], 'dashboard-time-weather-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-time-weather-tile');
    }
}
