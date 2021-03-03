<?php

namespace App\Http\Controllers;

use App\Architecture\Client\Interfaces\IClientService;
use App\Architecture\Product\Interfaces\IProductService;
use App\Architecture\Sale\Interfaces\ISaleService;
use App\Architecture\Sale\Interfaces\IStatusService;
use App\Traits\Requests;
use App\Traits\Utils;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Utils, Requests;

    /**
     * @var IClientService
     * @var ISaleService
     * @var IProductService
     * @var IStatusService
     */
    protected $IClientService;
    protected $ISaleService;
    protected $IProductService;
    protected $IStatusService;

    /**
     * Controller constructor.
     * @param IClientService $IClientService
     * @param ISaleService $ISaleService
     * @param IProductService $IProductService
     * @param IStatusService $IStatusService
     */
    public function __construct(IClientService $IClientService,
                                ISaleService $ISaleService,
                                IProductService $IProductService,
                                IStatusService $IStatusService)
    {
        $this->IClientService = $IClientService;
        $this->ISaleService = $ISaleService;
        $this->IProductService = $IProductService;
        $this->IStatusService = $IStatusService;
    }
}
