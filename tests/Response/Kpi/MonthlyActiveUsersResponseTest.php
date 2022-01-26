<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Kpi;

use ImmobiliareLabs\BrazeSDK\Response\Kpi\MonthlyActiveUsersResponse;
use PHPUnit\Framework\TestCase;

class MonthlyActiveUsersResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new MonthlyActiveUsersResponse();

        $data = ['item'];

        $response->fillFromArray(['data' => $data]);

        $this->assertSame($data, $response->data);
    }
}
