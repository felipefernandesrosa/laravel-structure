<?php

namespace App\Core\Providers\Custom;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class RepositoryServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->app->bind(
            'App\Core\Repositories\Interfaces\CompanyRepositoryInterface',
            'App\Core\Repositories\CompanyRepository'
        );
    }
}
