<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\ListRequest;
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
