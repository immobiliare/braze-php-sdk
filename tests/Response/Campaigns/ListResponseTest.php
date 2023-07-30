<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Campaigns;

use ImmobiliareLabs\BrazeSDK\Response\Campaigns\ListResponse;
use PHPUnit\Framework\TestCase;

class ListResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new ListResponse();

        $response->fillFromArray(['campaigns' => [[
            'id' => 'id',
            'last_edited' => '2022-01-26 17:48:00',
            'name' => 'name',
            'is_api_campaign' => true,
            'tags' => ['tag'],
        ]]]);

        $this->assertCount(1, $response->campaigns);
    }
}
