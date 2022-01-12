<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Feed;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Feed\DetailsRequest;
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
    public function testNoCardId(DetailsRequest $detailsRequest): void
    {
        $this->expectException(ValidationException::class);

        $detailsRequest->card_id = null;

        $detailsRequest->validate(true);
    }

    public function validProvider(): array
    {
        $detailsRequest1 = new DetailsRequest();

        $detailsRequest1->card_id = 'card_id';

        return [
            [$detailsRequest1]
        ];
    }
}
