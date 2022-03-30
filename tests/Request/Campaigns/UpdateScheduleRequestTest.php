<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\UpdateScheduleRequest;
use PHPUnit\Framework\TestCase;

class UpdateScheduleRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(UpdateScheduleRequest $updateScheduleRequest): void
    {
        $updateScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCampaignId(UpdateScheduleRequest $updateScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateScheduleRequest->campaign_id = null;

        $updateScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoScheduleId(UpdateScheduleRequest $updateScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateScheduleRequest->schedule_id = null;

        $updateScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSchedule(UpdateScheduleRequest $updateScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateScheduleRequest->schedule = null;

        $updateScheduleRequest->validate(true);
    }

    public function validProvider(): array
    {
        $updateScheduleRequest1 = new UpdateScheduleRequest();

        $updateScheduleRequest1->campaign_id = 'campaign_id';
        $updateScheduleRequest1->schedule_id = 'schedule_id';
        $updateScheduleRequest1->schedule = new Schedule();

        return [
            [$updateScheduleRequest1]
        ];
    }
}
