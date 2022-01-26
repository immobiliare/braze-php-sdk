<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Feed;

use ImmobiliareLabs\BrazeSDK\Response\Feed\DetailsResponse;
use PHPUnit\Framework\TestCase;

class DetailsResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new DetailsResponse();

        $tags = ['tag'];
        $extras = ['extra'];

        $response->fillFromArray([
            'tags' => $tags,
            'extras' => $extras,
        ]);

        $this->assertSame($tags, $response->tags);
        $this->assertSame($extras, $response->extras);
    }
}
