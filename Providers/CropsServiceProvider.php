<?php

namespace Modules\Crops\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Crops\Domain\Interfaces\ICropsRepository;
use Modules\Crops\Infrastructure\Repositories\CropsRepository;
use Modules\Crops\Application\Contracts\ICropsService;
use Modules\Crops\Application\Services\CropsService;

class CropsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ICropsRepository::class, CropsRepository::class);
        $this->app->bind(ICropsService::class,CropsService::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(module_path('Crops', 'Database/Migrations'));
    }
}