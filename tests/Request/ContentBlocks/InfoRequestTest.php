<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\InfoRequest;
use PHPUnit\Framework\TestCase;

class InfoRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(InfoRequest $infoRequest): void
    {
        $infoRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoContentBlockID(InfoRequest $infoRequest): void
    {
        $this->expectException(ValidationException::class);

        $infoRequest->content_block_id = null;

        $infoRequest->validate(true);
    }

    public function validProvider(): array
    {
        $infoRequest = new InfoRequest();
        $infoRequest->content_block_id = 'content_block_id';

        return [
            [$infoRequest],
        ];
    }
}
