<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\Webhook;
use PHPUnit\Framework\TestCase;

class WebhookTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(Webhook $webhook): void
    {
        $webhook->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUrl(Webhook $webhook): void
    {
        $this->expectException(ValidationException::class);

        $webhook->url = null;

        $webhook->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoRequestMethod(Webhook $webhook): void
    {
        $this->expectException(ValidationException::class);

        $webhook->request_method = null;

        $webhook->validate(true);
    }

    public function validProvider(): array
    {
        $webhook1 = new Webhook();

        $webhook1->url = 'url';
        $webhook1->request_method = 'request_method';

        return [
            [$webhook1]
        ];
    }
}
