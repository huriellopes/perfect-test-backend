<?php

namespace App\Architecture\Client\Validates;

use App\Architecture\BaseValidate;

class ClientValidate extends BaseValidate
{
    protected $rules = [
        'name' => 'required|string|max:200',
        'email' => 'required|string|max:200|email:rfc,dns|validaEmail',
        'cpf' => 'required|string|max:11|validaCpf'
    ];

    protected $messages = [];
}
