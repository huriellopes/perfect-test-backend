<?php

namespace App\Architecture\Sale\Repositories;

use App\Architecture\Sale\Interfaces\ISaleRepository;
use App\Architecture\Sale\Models\Sale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class SaleRepository implements ISaleRepository
{
    /**
     * @return Collection
     */
    public function list_sale() : Collection
    {
        return Sale::select('ss.slug', 'sales.quantity', DB::raw('(p.price - sales.discount) * sales.quantity as total'))
            ->join('sales_status as ss', 'sales.status_id', '=', 'ss.id_sales_status')
            ->join('products as p', 'sales.product_id', '=', 'p.id_product')
            ->groupBy('ss.slug', 'sales.quantity', 'p.price', 'sales.discount')
            ->get();
    }

    /**
     * @param stdClass $params
     * @return Sale
     */
    public function store(stdClass $params) : Sale
    {
        $sale = new Sale();
        $sale->product_id = $params->product_id;
        $sale->client_id = $params->client_id;
        $sale->saled_at = $params->saled_at;
        $sale->quantity = $params->quantity;
        $sale->discount = $params->discount;
        $sale->status_id = $params->status_id;
        $sale->save();

        return $sale;
    }

    /**
     * @param Sale $sale
     * @param $params
     * @return Sale
     */
    public function update(Sale $sale, $params) : Sale
    {
        $sale->product_id = $params->product_id;
        $sale->client_id = $params->client_id;
        $sale->saled_id = $params->saled_id;
        $sale->quantity = $params->quantity;
        $sale->dicount = $params->discount;
        $sale->status_id = $params->status_id;
        $sale->updated_at = Carbon::now();
        $sale->save();
    }
}
