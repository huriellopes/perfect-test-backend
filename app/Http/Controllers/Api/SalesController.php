<?php


namespace App\Http\Controllers\Api;

use App\Architecture\Sale\Enum\SaleEnum;
use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Exception;
use stdClass;
use Throwable;

class SalesController extends Controller
{
    /**
     * @param SaleRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(SaleRequest $request) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $params_client = new stdClass();
                $params_client->name = $this->limpa_tags($request->input('client_name'));
                $params_client->email = $this->limpa_tags($request->input('client_email'));
                $params_client->cpf = $this->limpar_mascara($this->limpa_tags($request->input('client_cpf')));

                $id_client = $this->IClientService->store($params_client);

                $params_sale = new stdClass();
                $params_sale->product_id = $this->limpa_tags($request->input('product_id'));
                $params_sale->client_id = $id_client->id_client;
                $params_sale->saled_at = $this->formDataHora($this->limpa_tags($request->input('saled_at')), 'Y-m-d H:i:s');
                $params_sale->quantity = $this->limpa_tags($request->input('quantity'));
                $params_sale->discount = $this->converte_float($this->limpa_tags($request->input('discount')));
                $params_sale->status_id = $this->limpa_tags($request->input('status_id'));

                $this->ISaleService->store($params_sale);
            DB::commit();
            return $this->returnResponse(SaleEnum::CREATED,StatusEnum::CREATED);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, SaleEnum::NOT_CREATED);
        }
    }
}
