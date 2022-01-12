<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\CreateRequest;

class CreateRequestTest extends CreateUpdateRequestTest
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(CreateRequest $createRequest): void
    {
        $createRequest->validate(true);
    }

    public function validProvider(): array
    {
        $createRequest = new CreateRequest();
        $createRequest->name = 'name';
        $createRequest->content = 'content';

        return [
            [$createRequest],
        ];
    }
}
