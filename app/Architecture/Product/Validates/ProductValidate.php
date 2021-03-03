<?php

namespace App\Architecture\Product\Validates;

use App\Architecture\BaseValidate;

class ProductValidate extends BaseValidate
{
    protected $rules = [
        'name' => 'required|max:200|string',
        'description' => 'required|max:200|string',
        'price' => 'required'
    ];

    protected $messages = [];
}
