<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Request\Canvas\ListRequest;
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

    public function testJsonSerialize(): void
    {
        $listRequest = new ListRequest();
        $listRequest->last_edit_time_gt = true;

        $serialized = $listRequest->jsonSerialize();

        $this->assertArrayHasKey('last_edit.time[gt]', $serialized);
    }

    public function validProvider(): array
    {
        $listRequest1 = new ListRequest();

        return [
            [$listRequest1]
        ];
    }
}
