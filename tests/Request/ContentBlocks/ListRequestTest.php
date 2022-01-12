<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\ListRequest;
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
        $listRequest = new ListRequest();

        return [
            [$listRequest],
        ];
    }
}
