<?php

namespace App\Architecture\Sale\Services;

use App\Architecture\Sale\Interfaces\IStatusRepository;
use App\Architecture\Sale\Interfaces\IStatusService;
use Illuminate\Database\Eloquent\Collection;

class StatusService implements IStatusService
{
    /**
     * @var IStatusRepository
     */
    protected $IStatusRepository;

    /**
     * StatusService constructor.
     * @param IStatusRepository $IStatusRepository
     */
    public function __construct(IStatusRepository $IStatusRepository)
    {
        $this->IStatusRepository = $IStatusRepository;
    }

    /**
     * @return Collection
     */
    public function list_status() : Collection
    {
        return $this->IStatusRepository->list_status();
    }
}
