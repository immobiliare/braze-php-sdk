<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\UpdateRequest;

class UpdateRequestTest extends CreateUpdateRequestTest
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(UpdateRequest $updateRequest): void
    {
        $updateRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoContentBlockID(UpdateRequest $updateRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateRequest->content_block_id = null;

        $updateRequest->validate(true);
    }

    public function validProvider(): array
    {
        $updateRequest = new UpdateRequest();
        $updateRequest->content_block_id = 'content_block_id';
        $updateRequest->name = 'name';
        $updateRequest->content = 'content';

        return [
            [$updateRequest],
        ];
    }
}
