<?php

namespace App\Rule;

class Email
{
    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @return mixed
     */
    public function valida($attribute, $value, $parameters, $validator)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
