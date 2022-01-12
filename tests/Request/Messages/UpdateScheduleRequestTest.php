<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Messages\UpdateScheduleRequest;
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
    public function testNoScheduleId(UpdateScheduleRequest $updateScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateScheduleRequest->schedule_id = null;

        $updateScheduleRequest->validate(true);
    }

    public function validProvider(): array
    {
        $updateScheduleRequest1 = new UpdateScheduleRequest();

        $updateScheduleRequest1->schedule_id = 'schedule_id';

        return [
            [$updateScheduleRequest1]
        ];
    }
}
