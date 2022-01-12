<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Sends;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Sends\CreateRequest;
use PHPUnit\Framework\TestCase;

class CreateRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(CreateRequest $createRequest): void
    {
        $createRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCampaignId(CreateRequest $createRequest): void
    {
        $this->expectException(ValidationException::class);

        $createRequest->campaign_id = null;

        $createRequest->validate(true);
    }

    public function validProvider(): array
    {
        $createRequest1 = new CreateRequest();

        $createRequest1->campaign_id = 'campaign_id';

        return [
            [$createRequest1]
        ];
    }
}
