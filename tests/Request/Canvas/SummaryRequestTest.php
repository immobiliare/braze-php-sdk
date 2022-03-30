<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Canvas;

use DateTimeImmutable;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\SummaryRequest;
use PHPUnit\Framework\TestCase;

class SummaryRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(SummaryRequest $summaryRequest): void
    {
        $summaryRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCanvasId(SummaryRequest $summaryRequest): void
    {
        $this->expectException(ValidationException::class);

        $summaryRequest->canvas_id = null;

        $summaryRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEndingAt(SummaryRequest $summaryRequest): void
    {
        $this->expectException(ValidationException::class);

        $summaryRequest->ending_at = null;

        $summaryRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoLength(SummaryRequest $summaryRequest): void
    {
        $this->expectException(ValidationException::class);

        $summaryRequest->length = null;

        $summaryRequest->validate(true);
    }

    public function validProvider(): array
    {
        $summaryRequest1 = new SummaryRequest();

        $summaryRequest1->canvas_id = 'canvas_id';
        $summaryRequest1->ending_at = new DateTimeImmutable();
        $summaryRequest1->length = 1;

        return [
            [$summaryRequest1]
        ];
    }
}
