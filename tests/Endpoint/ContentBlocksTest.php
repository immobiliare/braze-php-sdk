<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks;

class ContentBlocksTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->contentBlocks()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['list', ContentBlocks\ListRequest::class],
            ['info', ContentBlocks\InfoRequest::class],
            ['create', ContentBlocks\CreateRequest::class],
            ['update', ContentBlocks\UpdateRequest::class],
        ];
    }
}
