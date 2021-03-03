<?php

namespace App\Architecture\Product\Services;

use App\Architecture\Product\Interfaces\IProductRepository;
use App\Architecture\Product\Interfaces\IProductService;
use App\Architecture\Product\Models\Product;
use App\Architecture\Product\Validates\ProductValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Throwable;

class ProductService implements IProductService
{
    /**
     * @var IProductRepository
     * @var ProductValidate
     */
    protected $IProductRepository;
    protected $ProductValidate;

    /**
     * ProductService constructor.
     * @param IProductRepository $IProductRepository
     * @param ProductValidate $ProductValidate
     */
    public function __construct(IProductRepository $IProductRepository, ProductValidate $ProductValidate)
    {
        $this->IProductRepository = $IProductRepository;
        $this->ProductValidate = $ProductValidate;
    }

    /**
     * @return Collection
     */
    public function list_products() : Collection
    {
        return $this->IProductRepository->list_products();
    }

    /**
     * @param int $id
     * @return Product|null
     * @throws \App\Exceptions\SystemException
     */
    public function findProduct(int $id) : ?Product
    {
        $this->getProductValidate()->validateInt($id);
        return $this->IProductRepository->findProduct($id);
    }

    /**
     * @param stdClass $params
     * @return Product
     * @throws Throwable
     */
    public function store(stdClass $params) : Product
    {
        $this->getProductValidate()->validaParametros($params);
        return $this->IProductRepository->store($params);
    }

    /**
     * @param Product $product
     * @param stdClass $params
     * @return Product
     * @throws Throwable
     */
    public function update(Product $product, stdClass $params) : Product
    {
        $this->getProductValidate()->validaParametros($params);
        return $this->IProductRepository->update($product, $params);
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function delete(Product $product) : Product
    {
        return $this->IProductRepository->delete($product);
    }

    /**
     * @return ProductValidate
     */
    private function getProductValidate() : ProductValidate
    {
        return $this->ProductValidate;
    }
}
