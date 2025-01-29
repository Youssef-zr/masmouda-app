<?php

namespace App\Providers;

use App\Repositories\Back\Members\IMemberRepository;
use App\Repositories\Back\Members\MemberRepository;
use App\Repositories\Both\IModelRepository;
use App\Repositories\Both\ModelRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IMemberRepository::class, MemberRepository::class);
        $this->app->bind(abstract: IModelRepository::class, concrete: ModelRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
