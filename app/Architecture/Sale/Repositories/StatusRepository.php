<?php

namespace App\Architecture\Sale\Repositories;

use App\Architecture\Sale\Interfaces\IStatusRepository;
use App\Architecture\Sale\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class StatusRepository implements IStatusRepository
{
    /**
     * @return Collection
     */
    public function list_status() : Collection
    {
        return Status::all();
    }
}
