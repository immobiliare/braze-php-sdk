<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Segments;

use ImmobiliareLabs\BrazeSDK\Response\Segments\ListResponse;
use PHPUnit\Framework\TestCase;

class ListResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new ListResponse();

        $segments = ['segment'];

        $response->fillFromArray(['segments' => $segments]);

        $this->assertSame($segments, $response->segments);
    }
}
