<?php

namespace App\Architecture\Sale\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface IStatusService
{
    /**
     * @return Collection
     */
    public function list_status() : Collection;
}
