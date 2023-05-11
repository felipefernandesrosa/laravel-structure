<?php
namespace App\Core\Repositories;

use App\Core\Models\Company;
use App\Core\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }
}
