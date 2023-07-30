<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Canvas;

use ImmobiliareLabs\BrazeSDK\Response\Canvas\ListResponse;
use PHPUnit\Framework\TestCase;

class ListResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new ListResponse();

        $response->fillFromArray(['canvases' => [[
            'id' => 'id',
            'last_edited' => '2022-01-26 17:48:00',
            'name' => 'name',
            'tags' => ['tag'],
        ]]]);

        $this->assertCount(1, $response->canvases);
    }
}
