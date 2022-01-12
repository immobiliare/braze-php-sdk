<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Sessions;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Sessions\AnalyticsRequest;
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
    public function testNoLength(AnalyticsRequest $analyticsRequest): void
    {
        $this->expectException(ValidationException::class);

        $analyticsRequest->length = null;

        $analyticsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $analyticsRequest1 = new AnalyticsRequest();

        $analyticsRequest1->length = 'length';

        return [
            [$analyticsRequest1]
        ];
    }
}
