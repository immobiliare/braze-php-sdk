<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Sends;

class SendsTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->sends()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['create', Sends\CreateRequest::class]
        ];
    }
}
