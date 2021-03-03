<?php

namespace App\Architecture\Sale\Interfaces;

use App\Architecture\Sale\Models\Sale;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface ISaleService
{
    /**
     * @return Collection
     */
    public function list_sale() : Collection;

    /**
     * @param stdClass $params
     * @return Sale
     */
    public function store(stdClass $params) : Sale;

    /**
     * @param Sale $sale
     * @param $params
     * @return Sale
     */
    public function update(Sale $sale, $params) : Sale;
}
