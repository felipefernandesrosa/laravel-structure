<?php

namespace App\Api\Company\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class ListCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
