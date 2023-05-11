<?php

namespace App\Api\Company\Http\Controllers;

use App\Api\Company\Http\Requests\Company\ListCompanyRequest;
use App\Api\Company\Http\Resources\CompanyResource;
use App\Core\Contracts\CompanyServiceInterface;
use App\Core\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function __construct(protected CompanyServiceInterface $service) { }

    public function listCompanies(ListCompanyRequest $request)
    {
        return CompanyResource::collection($this->service->listCompanies($request->validated()));
    }
}
