<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\AnalyticsRequest;
use PHPUnit\Framework\TestCase;

class AnalyticsRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(AnalyticsRequest $analyticsRequest): void
    {
        $analyticsRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCanvasId(AnalyticsRequest $analyticsRequest): void
    {
        $this->expectException(ValidationException::class);

        $analyticsRequest->canvas_id = null;

        $analyticsRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEndingAt(AnalyticsRequest $analyticsRequest): void
    {
        $this->expectException(ValidationException::class);

        $analyticsRequest->ending_at = null;

        $analyticsRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLength(AnalyticsRequest $analyticsRequest): void
    {
        $this->expectException(ValidationException::class);

        $analyticsRequest->length = null;

        $analyticsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $analyticsRequest1 = new AnalyticsRequest();

        $analyticsRequest1->canvas_id = 'canvas_id';
        $analyticsRequest1->ending_at = 'ending_at';
        $analyticsRequest1->length = 'length';

        return [
            [$analyticsRequest1]
        ];
    }
}
