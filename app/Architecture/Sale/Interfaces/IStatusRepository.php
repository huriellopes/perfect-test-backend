<?php

namespace App\Architecture\Sale\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface IStatusRepository
{
    /**
     * @return Collection
     */
    public function list_status() : Collection;
}
