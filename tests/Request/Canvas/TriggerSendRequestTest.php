<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\TriggerSendRequest;
use PHPUnit\Framework\TestCase;

class TriggerSendRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(TriggerSendRequest $triggerSendRequest): void
    {
        $triggerSendRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCanvasId(TriggerSendRequest $triggerSendRequest): void
    {
        $this->expectException(ValidationException::class);

        $triggerSendRequest->canvas_id = null;

        $triggerSendRequest->validate(true);
    }

    public function validProvider(): array
    {
        $triggerSendRequest1 = new TriggerSendRequest();

        $triggerSendRequest1->canvas_id = 'canvas_id';

        return [
            [$triggerSendRequest1]
        ];
    }
}
