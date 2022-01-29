<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Canvas;

class CanvasTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->canvas()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['triggerSend', Canvas\TriggerSendRequest::class],
            ['createSchedule', Canvas\CreateScheduleRequest::class],
            ['updateSchedule', Canvas\UpdateScheduleRequest::class],
            ['deleteSchedule', Canvas\DeleteScheduleRequest::class],
            ['summary', Canvas\SummaryRequest::class],
            ['analytics', Canvas\AnalyticsRequest::class],
            ['details', Canvas\DetailsRequest::class],
            ['list', Canvas\ListRequest::class],
        ];
    }
}
