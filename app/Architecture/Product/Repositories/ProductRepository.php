<?php

namespace App\Architecture\Product\Repositories;

use App\Architecture\Product\Interfaces\IProductRepository;
use App\Architecture\Product\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ProductRepository implements IProductRepository
{
    /**
     * @return Collection
     */
    public function list_products(): Collection
    {
        return Product::whereNull('deleted_at')->get();
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function findProduct(int $id) : ?Product
    {
        return Product::where('id_product', $id)
                    ->whereNull('deleted_at')
                    ->first();
    }

    /**
     * @param stdClass $params
     * @return Product
     */
    public function store(stdClass $params): Product
    {
        $product = new Product;
        $product->name = $params->name;
        $product->description = $params->description;
        $product->price = $params->price;
        $product->save();

        return $product;
    }

    /**
     * @param Product $product
     * @param stdClass $params
     * @return Product
     */
    public function update(Product $product, stdClass $params): Product
    {
        $product->name = $params->name;
        $product->description = $params->description;
        $product->price = $params->price;
        $product->updated_at = Carbon::now();
        $product->save();

        return $product;
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function delete(Product $product) : Product
    {
        $product->deleted_at = Carbon::now();
        $product->save();

        return $product;
    }
}
