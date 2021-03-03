<?php

namespace App\Architecture\Client\Services;

use App\Architecture\Client\Interfaces\IClientRepository;
use App\Architecture\Client\Interfaces\IClientService;
use App\Architecture\Client\Models\Client;
use App\Architecture\Client\Validates\ClientValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Throwable;

class ClientService implements IClientService
{
    /**
     * @var IClientRepository
     * @var ClientValidate
     */
    protected $IClientRepository;
    protected $ClientValidate;

    /**
     * ClientService constructor.
     * @param IClientRepository $IClientRepository
     * @param ClientValidate $ClientValidate
     */
    public function __construct(IClientRepository $IClientRepository, ClientValidate $ClientValidate)
    {
        $this->IClientRepository = $IClientRepository;
        $this->ClientValidate = $ClientValidate;
    }

    /**
     * @return Collection
     */
    public function list_clients() : Collection
    {
        return $this->IClientRepository->list_clients();
    }

    /**
     * @param stdClass $params
     * @return Client
     * @throws Throwable
     */
    public function store(stdClass $params) : Client
    {
        $this->getClientValidate()->validaParametros($params);
        return $this->IClientRepository->store($params);
    }

    /**
     * @param Client $client
     * @param stdClass $params
     * @return Client
     * @throws Throwable
     */
    public function update(Client $client, stdClass $params) : Client
    {
        $this->getClientValidate()->validaParametros($params);
        return $this->IClientRepository->update($client, $params);
    }

    /**
     * @return ClientValidate
     */
    private function getClientValidate() : ClientValidate
    {
        return $this->ClientValidate;
    }
}
