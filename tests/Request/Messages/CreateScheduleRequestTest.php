<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages;
use ImmobiliareLabs\BrazeSDK\Object\Schedule;
use ImmobiliareLabs\BrazeSDK\Request\Messages\CreateScheduleRequest;
use PHPUnit\Framework\TestCase;

class CreateScheduleRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(CreateScheduleRequest $createScheduleRequest): void
    {
        $createScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCampaignId(CreateScheduleRequest $createScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $createScheduleRequest->campaign_id = null;

        $createScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSchedule(CreateScheduleRequest $createScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $createScheduleRequest->schedule = null;

        $createScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoMessages(CreateScheduleRequest $createScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $createScheduleRequest->messages = null;

        $createScheduleRequest->validate(true);
    }

    public function validProvider(): array
    {
        $createScheduleRequest1 = new CreateScheduleRequest();

        $createScheduleRequest1->campaign_id = 'campaign_id';
        $createScheduleRequest1->schedule = new Schedule();
        $createScheduleRequest1->messages = new Messages();

        return [
            [$createScheduleRequest1]
        ];
    }
}
