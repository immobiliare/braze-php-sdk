<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Kpi;

use ImmobiliareLabs\BrazeSDK\Response\Kpi\DailyActiveUsersResponse;
use PHPUnit\Framework\TestCase;

class DailyActiveUsersResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new DailyActiveUsersResponse();

        $data = ['item'];

        $response->fillFromArray(['data' => $data]);

        $this->assertSame($data, $response->data);
    }
}
