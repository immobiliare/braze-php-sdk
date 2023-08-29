<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Subscription;

use ImmobiliareLabs\BrazeSDK\Response\Subscription\GetStatusResponse;
use PHPUnit\Framework\TestCase;

class GetStatusResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new GetStatusResponse();

        $status = ['external_id' => 'status'];

        $response->fillFromArray(['status' => $status]);

        $this->assertSame($status, $response->status);
    }
}
