<?php


namespace App\Architecture\Sale\Services;

use App\Architecture\Sale\Interfaces\ISaleRepository;
use App\Architecture\Sale\Interfaces\ISaleService;
use App\Architecture\Sale\Models\Sale;
use App\Architecture\Sale\Validates\SaleValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Throwable;

class SaleService implements ISaleService
{
    /**
     * @var ISaleRepository
     * @var SaleValidate
     */
    protected $ISaleRepository;
    protected $SaleValidate;

    /**
     * SaleService constructor.
     * @param ISaleRepository $ISaleRepository
     * @param SaleValidate $SaleValidate
     */
    public function __construct(ISaleRepository $ISaleRepository, SaleValidate $SaleValidate)
    {
        $this->ISaleRepository = $ISaleRepository;
        $this->SaleValidate = $SaleValidate;
    }

    /**
     * @return Collection
     */
    public function list_sale() : Collection
    {
        return $this->ISaleRepository->list_sale();
    }

    /**
     * @param stdClass $params
     * @return Sale
     * @throws Throwable
     */
    public function store(stdClass $params) : Sale
    {
        $this->getSaleValidate()->validaParametros($params);
        return $this->ISaleRepository->store($params);
    }

    /**
     * @param Sale $sale
     * @param $params
     * @return Sale
     * @throws Throwable
     */
    public function update(Sale $sale, $params) : Sale
    {
        $this->getSaleValidate()->validaParametros($params);
        return $this->ISaleRepository->update($sale, $params);
    }

    /**
     * @return SaleValidate
     */
    private function getSaleValidate() : SaleValidate
    {
        return $this->SaleValidate;
    }
}
