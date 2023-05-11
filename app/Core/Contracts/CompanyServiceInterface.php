<?php

namespace App\Core\Contracts;

use Illuminate\Support\Collection;

interface CompanyServiceInterface
{
    public function listCompanies(array $attributes) : Collection;
}
