<?php

namespace App\Architecture\Product\Interfaces;

use App\Architecture\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface IProductService
{
    /**
     * @return Collection
     */
    public function list_products() : Collection;

    /**
     * @param int $id
     * @return Product|null
     */
    public function findProduct(int $id) : ?Product;

    /**
     * @param stdClass $params
     * @return Product
     */
    public function store(stdClass $params) : Product;

    /**
     * @param Product $product
     * @param stdClass $params
     * @return Product
     */
    public function update(Product $product, stdClass $params) : Product;

    /**
     * @param Product $product
     * @return Product
     */
    public function delete(Product $product) : Product;
}
