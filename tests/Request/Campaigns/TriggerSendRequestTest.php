<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Campaigns;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\TriggerSendRequest;
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
    public function testNoCampaignID(TriggerSendRequest $triggerSendRequest): void
    {
        $this->expectException(ValidationException::class);

        $triggerSendRequest->campaign_id = null;

        $triggerSendRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoRecipientsOrBroadcast(TriggerSendRequest $triggerSendRequest): void
    {
        $this->expectException(ValidationException::class);

        $triggerSendRequest->broadcast = false;
        $triggerSendRequest->recipients = null;

        $triggerSendRequest->validate(false);
    }

    public function validProvider(): array
    {
        $recipient = new Recipient();
        $recipient->external_user_id = 'external_user_id';

        $trackRequest1 = new TriggerSendRequest();
        $trackRequest1->campaign_id = 'campaign_id';
        $trackRequest1->recipients = [$recipient];
        $trackRequest1->broadcast = false;

        $trackRequest2 = new TriggerSendRequest();
        $trackRequest2->campaign_id = 'campaign_id';
        $trackRequest2->broadcast = true;

        return [
            [$trackRequest1],
            [$trackRequest2],
        ];
    }
}
