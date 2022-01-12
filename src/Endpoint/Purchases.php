<?php

namespace ImmobiliareLabs\BrazeSDK\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Purchases\ProductListRequest;
use ImmobiliareLabs\BrazeSDK\Response\Purchases\ProductListResponse;

class Purchases extends Endpoint
{
    /**
     * @see https://www.braze.com/docs/api/endpoints/export/purchases/get_list_product_id/
     */
    public function productList(ProductListRequest $request, bool $resolveResponse = true): ProductListResponse
    {
        return $this->makeRequest('GET', '/purchases/product_list', $request, ProductListResponse::class, $resolveResponse);
    }
}
