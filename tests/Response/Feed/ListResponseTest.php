<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Feed;

use ImmobiliareLabs\BrazeSDK\Response\Feed\ListResponse;
use PHPUnit\Framework\TestCase;

class ListResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new ListResponse();

        $cards = ['card'];

        $response->fillFromArray(['cards' => $cards]);

        $this->assertSame($cards, $response->cards);
    }
}
