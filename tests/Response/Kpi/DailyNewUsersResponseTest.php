<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Kpi;

use ImmobiliareLabs\BrazeSDK\Response\Kpi\DailyNewUsersResponse;
use PHPUnit\Framework\TestCase;

class DailyNewUsersResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new DailyNewUsersResponse();

        $data = ['item'];

        $response->fillFromArray(['data' => $data]);

        $this->assertSame($data, $response->data);
    }
}
