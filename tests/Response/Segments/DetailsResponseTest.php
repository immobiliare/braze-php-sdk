<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Segments;

use ImmobiliareLabs\BrazeSDK\Response\Segments\DetailsResponse;
use PHPUnit\Framework\TestCase;

class DetailsResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new DetailsResponse();

        $tags = ['tag'];

        $response->fillFromArray([
            'tags' => $tags,
        ]);

        $this->assertSame($tags, $response->tags);
    }
}
