<?php

namespace App\Http\Requests;

use App\Architecture\Client\Validates\ClientValidate;
use App\Architecture\Sale\Validates\SaleValidate;
use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [(new ClientValidate())->getRules()],
            [(new SaleValidate())->getRules()]
        ];
    }
}
