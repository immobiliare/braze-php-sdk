<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Users;

class UsersTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->users()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['track', Users\TrackRequest::class],
            ['createAlias', Users\CreateAliasRequest::class],
            ['identify', Users\IdentifyRequest::class],
            ['delete', Users\DeleteRequest::class],
            ['merge', Users\MergeRequest::class],
            ['renameExternalID', Users\RenameExternalIDRequest::class],
            ['removeExternalID', Users\RemoveExternalIDRequest::class],
            ['exportByIdentifier', Users\ExportByIdentifierRequest::class],
            ['exportBySegment', Users\ExportBySegmentRequest::class],
            ['exportByGlobalControlGroup', Users\ExportByGlobalControlGroupRequest::class],
        ];
    }
}
