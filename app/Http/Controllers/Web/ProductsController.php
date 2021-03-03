<?php

namespace App\Http\Controllers\Web;

use App\Architecture\Product\Models\Product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    private $viewPath = "dash.products.";

    public function create()
    {
        return view($this->viewPath.'create');
    }

    public function show(Product $product)
    {
        return view($this->viewPath.'update', compact('product'));
    }
}
