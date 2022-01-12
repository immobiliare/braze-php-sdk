<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Segments;

use ImmobiliareLabs\BrazeSDK\Request\Segments\ListRequest;
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
