<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Feed;

use ImmobiliareLabs\BrazeSDK\Request\Feed\ListRequest;
use PHPUnit\Framework\TestCase;

class ListRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ListRequest $listRequest): void
    {
        $listRequest->validate(true);
    }

    public function validProvider(): array
    {
        $listRequest1 = new ListRequest();


        return [
            [$listRequest1]
        ];
    }
}
