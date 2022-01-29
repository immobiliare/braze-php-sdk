<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Endpoint;

use ImmobiliareLabs\BrazeSDK\Request\Campaigns;

class CampaignsTest extends EndpointTest
{
    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoint(string $method, string $requestType): void
    {
        $this->braze->campaigns()->{$method}(new $requestType(), false);
    }

    public function endpointProvider(): array
    {
        return [
            ['triggerSend', Campaigns\TriggerSendRequest::class],
            ['createSchedule', Campaigns\CreateScheduleRequest::class],
            ['updateSchedule', Campaigns\UpdateScheduleRequest::class],
            ['deleteSchedule', Campaigns\DeleteScheduleRequest::class],
            ['analytics', Campaigns\AnalyticsRequest::class],
            ['details', Campaigns\DetailsRequest::class],
            ['list', Campaigns\ListRequest::class],
        ];
    }
}
