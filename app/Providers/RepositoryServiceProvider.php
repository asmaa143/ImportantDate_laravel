<?php

namespace App\Providers;

use App\Repository\AdminRepositoryInterface;
use App\Repository\DateSetupRepositoryInterface;
use App\Repository\Eloquent\AdminRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\DateSetupRepository;
use App\Repository\Eloquent\FamilyRepository;
use App\Repository\Eloquent\NationalityRepository;
use App\Repository\Eloquent\RoleRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\FamilyRepositoryInterface;
use App\Repository\NationalityRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(DateSetupRepositoryInterface::class, DateSetupRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(FamilyRepositoryInterface::class, FamilyRepository::class);
        $this->app->bind(NationalityRepositoryInterface::class, NationalityRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
