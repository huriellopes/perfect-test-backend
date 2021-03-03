<?php

namespace App\Http\Controllers\Api;

use App\Architecture\Product\Enum\ProductEnum;
use App\Architecture\Product\Models\Product;
use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use stdClass;
use Throwable;

class ProductsController extends Controller
{
    /**
     * @param ProductRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(ProductRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->name = $this->limpa_tags($request->input('name'));
                $params->description = $this->limpa_tags($request->input('description'));
                $params->price = $this->converte_float($this->limpa_tags($request->input('price')));

                $this->IProductService->store($params);
            DB::commit();
            return $this->returnResponse(ProductEnum::CREATED,StatusEnum::CREATED);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, ProductEnum::NOT_CREATED);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $product = $this->IProductService->findProduct($request->id);
        return view('dash.products.show', compact('product'));
    }

    /**
     * @param Product $product
     * @param ProductRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(Product $product, ProductRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->name = $this->limpa_tags($request->input('name'));
                $params->description = $this->limpa_tags($request->input('description'));
                $params->price = $this->converte_float($this->limpa_tags($request->input('price')));

                $this->IProductService->update($product, $params);
            DB::commit();

            return $this->returnResponse(ProductEnum::UPDATED,StatusEnum::OK);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, ProductEnum::NOT_UPDATED);
        }
    }

    /**
     * @param Product $product
     * @return JsonResponse
     * @throws Throwable
     */
    public function delete(Product $product): JsonResponse
    {
        try {
            DB::beginTransaction();
                $this->IProductService->delete($product);
            DB::commit();
            return $this->returnResponse(ProductEnum::DELETE,StatusEnum::OK);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, ProductEnum::NOT_DELETED);
        }
    }
}
