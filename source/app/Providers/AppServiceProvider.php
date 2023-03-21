<?php

namespace App\Providers;

use Domain\Group\Actions\CreateGroup\CreateGroup;
use Domain\Group\Actions\CreateGroup\Impl\CreateGroupJSON;
use Domain\Group\Actions\CreateGroup\Impl\Test;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateGroup::class, function ($app){
            return new CreateGroupJSON();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
