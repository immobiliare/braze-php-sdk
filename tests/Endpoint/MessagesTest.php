<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Messages;

class MessagesTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->messages()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['send', Messages\SendRequest::class],
            ['createSchedule', Messages\CreateScheduleRequest::class],
            ['updateSchedule', Messages\UpdateScheduleRequest::class],
            ['deleteSchedule', Messages\DeleteScheduleRequest::class],
            ['scheduledBroadcasts', Messages\ScheduledBroadcastsRequest::class],
        ];
    }
}
