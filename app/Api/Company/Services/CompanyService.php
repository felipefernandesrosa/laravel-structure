<?php

namespace App\Api\Company\Services;

use App\Core\Contracts\CompanyServiceInterface;
use App\Core\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Core\Services\Service;
use Illuminate\Support\Collection;

class CompanyService extends Service implements CompanyServiceInterface
{
    public function __construct(protected CompanyRepositoryInterface $repository) {
        parent::__construct();
    }

    public function listCompanies(array $attributes) : Collection
    {
        return collect(); //uncomment after create database with models
        //return $this->repository->list();
    }
}
