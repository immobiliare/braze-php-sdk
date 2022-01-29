<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Transactional;

class TransactionalTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->transactional()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['sendEmail', Transactional\SendEmailRequest::class],
        ];
    }
}
