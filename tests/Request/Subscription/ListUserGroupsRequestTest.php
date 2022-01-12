<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Subscription;

use ImmobiliareLabs\BrazeSDK\Request\Subscription\ListUserGroupsRequest;
use PHPUnit\Framework\TestCase;

class ListUserGroupsRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ListUserGroupsRequest $listUserGroupsRequest): void
    {
        $listUserGroupsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $listUserGroupsRequest1 = new ListUserGroupsRequest();


        return [
            [$listUserGroupsRequest1]
        ];
    }
}
