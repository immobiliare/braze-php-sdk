<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Sessions;

use ImmobiliareLabs\BrazeSDK\Response\Sessions\AnalyticsResponse;
use PHPUnit\Framework\TestCase;

class AnalyticsResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new AnalyticsResponse();

        $data = ['item'];

        $response->fillFromArray(['data' => $data]);

        $this->assertSame($data, $response->data);
    }
}
