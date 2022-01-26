<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Canvas;

use ImmobiliareLabs\BrazeSDK\Response\Canvas\DetailsResponse;
use PHPUnit\Framework\TestCase;

class DetailsResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new DetailsResponse();

        $channels = ['channel'];
        $variants = ['variant'];
        $steps = ['step'];

        $response->fillFromArray([
            'channels' => $channels,
            'variants' => $variants,
            'steps' => $steps,
        ]);

        $this->assertSame($channels, $response->channels);
        $this->assertSame($variants, $response->variants);
        $this->assertSame($steps, $response->steps);
    }
}
