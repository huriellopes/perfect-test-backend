<?php

namespace App\Architecture\Client\Repositories;

use App\Architecture\Client\Interfaces\IClientRepository;
use App\Architecture\Client\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ClientRepository implements IClientRepository
{
    /**
     * @return Collection
     */
    public function list_clients() : Collection
    {
        return Client::all();
    }

    /**
     * @param stdClass $params
     * @return Client
     */
    public function store(stdClass $params) : Client
    {
        $client = new Client();
        $client->name = $params->name;
        $client->email = $params->email;
        $client->cpf = $params->cpf;
        $client->save();

        return $client;
    }

    /**
     * @param Client $client
     * @param stdClass $params
     * @return Client
     */
    public function update(Client $client, stdClass $params) : Client
    {
        $client->name = $params->name;
        $client->email = $params->email;
        $client->cpf = $params->cpf;
        $client->updated_at = Carbon::now();
        $client->save();

        return $client;
    }
}
