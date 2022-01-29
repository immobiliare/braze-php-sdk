<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Purchases;

class PurchasesTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->purchases()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['productList', Purchases\ProductListRequest::class]
        ];
    }
}
