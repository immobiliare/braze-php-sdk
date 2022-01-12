<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\DeleteScheduleRequest;
use PHPUnit\Framework\TestCase;

class DeleteScheduleRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(DeleteScheduleRequest $deleteScheduleRequest): void
    {
        $deleteScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCanvasId(DeleteScheduleRequest $deleteScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $deleteScheduleRequest->canvas_id = null;

        $deleteScheduleRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoScheduleId(DeleteScheduleRequest $deleteScheduleRequest): void
    {
        $this->expectException(ValidationException::class);

        $deleteScheduleRequest->schedule_id = null;

        $deleteScheduleRequest->validate(true);
    }

    public function validProvider(): array
    {
        $deleteScheduleRequest1 = new DeleteScheduleRequest();

        $deleteScheduleRequest1->canvas_id = 'canvas_id';
        $deleteScheduleRequest1->schedule_id = 'schedule_id';

        return [
            [$deleteScheduleRequest1]
        ];
    }
}
