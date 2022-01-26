<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Campaigns;

use ImmobiliareLabs\BrazeSDK\Response\Campaigns\DetailsResponse;
use PHPUnit\Framework\TestCase;

class DetailsResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new DetailsResponse();

        $channels = ['channel'];
        $messages = ['message'];
        $conversion_behaviors = ['conversion_behavior'];

        $response->fillFromArray([
            'channels' => $channels,
            'messages' => $messages,
            'conversion_behaviors' => $conversion_behaviors,
        ]);

        $this->assertSame($channels, $response->channels);
        $this->assertSame($messages, $response->messages);
        $this->assertSame($conversion_behaviors, $response->conversion_behaviors);
    }
}
