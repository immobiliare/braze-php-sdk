<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Canvas;

use ImmobiliareLabs\BrazeSDK\Response\Canvas\SummaryResponse;
use PHPUnit\Framework\TestCase;

class SummaryResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new SummaryResponse();

        $data = ['item'];

        $response->fillFromArray(['data' => $data]);

        $this->assertSame($data, $response->data);
    }
}
