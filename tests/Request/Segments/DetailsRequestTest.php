<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Segments;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Segments\DetailsRequest;
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
    public function testNoSegmentId(DetailsRequest $detailsRequest): void
    {
        $this->expectException(ValidationException::class);

        $detailsRequest->segment_id = null;

        $detailsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $detailsRequest1 = new DetailsRequest();

        $detailsRequest1->segment_id = 'segment_id';

        return [
            [$detailsRequest1]
        ];
    }
}
