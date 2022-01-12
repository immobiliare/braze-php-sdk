<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Transactional;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Transactional\SendEmailRequest;
use PHPUnit\Framework\TestCase;

class SendEmailRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(SendEmailRequest $sendEmailRequest): void
    {
        $sendEmailRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCampaignId(SendEmailRequest $sendEmailRequest): void
    {
        $this->expectException(ValidationException::class);

        $sendEmailRequest->campaign_id = null;

        $sendEmailRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoRecipients(SendEmailRequest $sendEmailRequest): void
    {
        $this->expectException(ValidationException::class);

        $sendEmailRequest->recipients = null;

        $sendEmailRequest->validate(true);
    }

    public function validProvider(): array
    {
        $sendEmailRequest1 = new SendEmailRequest();

        $sendEmailRequest1->campaign_id = 'campaign_id';
        $sendEmailRequest1->recipients = 'recipients';

        return [
            [$sendEmailRequest1]
        ];
    }
}
