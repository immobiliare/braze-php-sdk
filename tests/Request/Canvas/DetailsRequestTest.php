<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Canvas;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Canvas\DetailsRequest;
use PHPUnit\Framework\TestCase;

class DetailsRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(DetailsRequest $detailsRequest): void
    {
        $detailsRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCanvasId(DetailsRequest $detailsRequest): void
    {
        $this->expectException(ValidationException::class);

        $detailsRequest->canvas_id = null;

        $detailsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $detailsRequest1 = new DetailsRequest();

        $detailsRequest1->canvas_id = 'canvas_id';

        return [
            [$detailsRequest1]
        ];
    }
}
