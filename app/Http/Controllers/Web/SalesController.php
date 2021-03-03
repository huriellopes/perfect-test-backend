<?php


namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    private $viewPath = "dash.sales.";

    public function create()
    {
        $list_status = $this->IStatusService->list_status();
        $products = $this->IProductService->list_products();

        return view($this->viewPath.'crud_sales', compact('list_status', 'products'));
    }
}
