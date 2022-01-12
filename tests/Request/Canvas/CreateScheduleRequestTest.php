<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\CreateScheduleRequest;
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
    public function testNoCanvasId(CreateScheduleRequest $createScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $createScheduleRequest->canvas_id = null;

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

    public function validProvider(): array
    {
        $createScheduleRequest1 = new CreateScheduleRequest();

        $createScheduleRequest1->canvas_id = 'canvas_id';
        $createScheduleRequest1->schedule = 'schedule';

        return [
            [$createScheduleRequest1]
        ];
    }
}
