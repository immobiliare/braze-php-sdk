<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Messages\ScheduledBroadcastsRequest;
use PHPUnit\Framework\TestCase;

class ScheduledBroadcastsRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ScheduledBroadcastsRequest $scheduledBroadcastsRequest): void
    {
        $scheduledBroadcastsRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEndTime(ScheduledBroadcastsRequest $scheduledBroadcastsRequest): void
    {
        $this->expectException(ValidationException::class);

        $scheduledBroadcastsRequest->end_time = null;

        $scheduledBroadcastsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $scheduledBroadcastsRequest1 = new ScheduledBroadcastsRequest();

        $scheduledBroadcastsRequest1->end_time = 'end_time';

        return [
            [$scheduledBroadcastsRequest1]
        ];
    }
}
