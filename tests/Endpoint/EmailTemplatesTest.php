<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates;

class EmailTemplatesTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->emailTemplates()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['list', EmailTemplates\ListRequest::class],
            ['info', EmailTemplates\InfoRequest::class],
            ['create', EmailTemplates\CreateRequest::class],
            ['update', EmailTemplates\UpdateRequest::class],
        ];
    }
}
