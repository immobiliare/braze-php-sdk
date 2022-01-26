<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Kpi;

use ImmobiliareLabs\BrazeSDK\Response\Kpi\DailyUninstallsResponse;
use PHPUnit\Framework\TestCase;

class DailyUninstallsResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new DailyUninstallsResponse();

        $data = ['item'];

        $response->fillFromArray(['data' => $data]);

        $this->assertSame($data, $response->data);
    }
}
