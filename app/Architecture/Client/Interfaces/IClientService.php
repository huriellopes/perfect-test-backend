<?php

namespace App\Architecture\Client\Interfaces;

use App\Architecture\Client\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface IClientService
{
    /**
     * @return Collection
     */
    public function list_clients() : Collection;

    /**
     * @param stdClass $params
     * @return Client
     */
    public function store(stdClass $params) : Client;

    /**
     * @param Client $client
     * @param stdClass $params
     * @return Client
     */
    public function update(Client $client, stdClass $params) : Client;
}
