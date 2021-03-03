<?php

namespace App\Traits;

use Carbon\Carbon;
use stdClass;

trait Utils
{
    /**
     * Função para limpar scripts
     *
     * @param $variavel
     * @return string|string[]|null
     */
    public function limpa_tags($variavel)
    {
        return preg_replace('(<(/?[^\>]+)>)', '', $variavel);
    }

    /**
     * @param $valor
     * @return float|null
     */
    public function converte_float($valor)
    {
        if ($valor) {
            $valor = preg_replace('/([^0-9\.,])/i', '', $valor);
            if (!is_numeric($valor)) {
                $valor = str_replace(array('.',','),array('','.'),$valor);
                return floatval($valor);
            } else {
                return floatval($valor);
            }
        } else {
            return NULL;
        }
    }

    /**
     * @param $value
     * @return string
     */
    public static function formatar_valor($value)
    {
        $value = (is_numeric($value)) ? $value : 0;
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    /**
     * @param $value
     * @param string $formato
     * @return string
     */
    public static function formata_data($value, $formato = 'd/m/Y')
    {
        if ($value) {
            return Carbon::parse($value)->format($formato);
        } else {
            return '';
        }
    }

    /**
     * @param $value
     * @param string $formato
     * @return string
     */
    public static function formata_data_hora($value, $formato = 'd/m/Y H:i:s')
    {
        if ($value) {
            return Carbon::parse($value)->format($formato);
        } else {
            return '';
        }
    }

    public function formDataHora($value, $formato = 'd/m/Y H:i:s')
    {
        if ($value) {
            return Carbon::parse($value)->format($formato);
        } else {
            return '';
        }
    }

    /**
     * @param $texto
     * @param int $limite
     * @return string|string[]|null
     */
    public function somente_numeros($texto, $limite = -1)
    {
        if ($limite < 0) {
            return preg_replace('#[^0-9]#','', trim($texto));
        } else {
            return preg_replace('#[^0-9]#','', self::cortar_string(trim($texto), $limite));
        }
    }

    /**
     * @param $telefone
     * @return string|string[]|null
     */
    public function formataTelefone($telefone)
    {
        if (strlen($telefone) > 10) {
            return preg_replace('@^(\d{2})(\d{1})(\d{4})(\d{4})$@','($1) $2 $3-$4' ,$telefone);
        } else {
            return preg_replace('@^(\d{2})(\d{4})(\d{4})$@', '($1) $2-$3', $telefone);
        }
    }

    /**
     * @param $nu_cpf_cnpj
     * @return string|string[]|null
     */
    public function pontuacao_cpf_cnpj($nu_cpf_cnpj)
    {
        if (strlen($nu_cpf_cnpj) > 11)
        {
            return preg_replace('@^(\d{2,3})(\d{3})(\d{3})(\d{4})(\d{2})$@', '$1.$2.$3/$4-$5', $nu_cpf_cnpj);
        } else {
            return preg_replace('@^(\d{3})(\d{3})(\d{3})(\d{2})$@', '$1.$2.$3-$4', $nu_cpf_cnpj);
        }
    }

    /**
     * @param $valor
     * @return string|string[]|null
     */
    public function limpar_mascara($valor)
    {
        if (!empty($valor)){
            $valor =  preg_replace('/\D+/', '', $valor);
        }

        return $valor;
    }
}
