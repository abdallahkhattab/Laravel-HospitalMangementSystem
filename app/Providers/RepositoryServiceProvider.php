<?php

namespace App\Providers;

use App\interfaces\Doctors\DoctorRepositoryInterface;
use App\interfaces\Sections\SectionRepositoryInterface;
use App\interfaces\Services\SingleServiceRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Services\SingleServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SectionRepositoryInterface::class,SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class,DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class,SingleServiceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
