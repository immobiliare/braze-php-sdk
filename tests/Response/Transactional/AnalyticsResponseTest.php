<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Transactional;

use ImmobiliareLabs\BrazeSDK\Response\Transactional\SendEmailResponse;
use PHPUnit\Framework\TestCase;

class AnalyticsResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new SendEmailResponse();

        $metadata = ['item'];

        $response->fillFromArray(['metadata' => $metadata]);

        $this->assertSame($metadata, $response->metadata);
    }
}
