<?php

namespace App\Rule;

use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return $this->validateCpf($attribute,$value);
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return 'O campo ":attribute" não é um CPF válido.';
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    protected function validateCpf($attribute, $value): bool
    {
        $c = preg_replace('/\D/', '', $value);

        if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
            return false;
        }

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }
}
