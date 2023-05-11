<?php

namespace App\Core\Providers\Custom;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class ContractServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->app->bind(
            'App\Core\Contracts\CompanyServiceInterface',
            'App\Api\Company\Services\CompanyService'
        );
    }
}
