<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResourceCollection;

class DashboardController extends Controller
{
    private $viewPath = 'dash.';

    public function index()
    {
        $products = $this->IProductService->list_products();
        $sales = $this->ISaleService->list_sale();
        $clients = $this->IClientService->list_clients();

        return view($this->viewPath.'index', compact('products', 'sales', 'clients'));
    }
}
