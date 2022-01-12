<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\DetailsRequest;
use PHPUnit\Framework\TestCase;

class DetailsRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(DetailsRequest $detailsRequest): void
    {
        $detailsRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCampaignId(DetailsRequest $detailsRequest): void
    {
        $this->expectException(ValidationException::class);

        $detailsRequest->campaign_id = null;

        $detailsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $detailsRequest1 = new DetailsRequest();

        $detailsRequest1->campaign_id = 'campaign_id';

        return [
            [$detailsRequest1]
        ];
    }
}
