<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\AnalyticsRequest;
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
    public function testNoCampaignId(AnalyticsRequest $analyticsRequest): void
    {
        $this->expectException(ValidationException::class);

        $analyticsRequest->campaign_id = null;

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

        $analyticsRequest1->campaign_id = 'campaign_id';
        $analyticsRequest1->length = 1;

        return [
            [$analyticsRequest1]
        ];
    }
}
