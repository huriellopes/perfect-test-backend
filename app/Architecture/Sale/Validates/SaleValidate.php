<?php

namespace App\Architecture\Sale\Validates;

use App\Architecture\BaseValidate;

class SaleValidate extends BaseValidate
{
    protected $rules = [
        'product_id' => 'required',
        'client_id' => 'required',
        'saled_at' => 'required',
        'quantity' => 'required',
        'discount' => 'required',
        'status_id' => 'required'
    ];

    protected $messages = [];
}
