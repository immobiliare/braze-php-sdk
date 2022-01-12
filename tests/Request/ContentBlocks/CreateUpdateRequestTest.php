<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\CreateRequest;
use PHPUnit\Framework\TestCase;

abstract class CreateUpdateRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     */
    public function testNoName(CreateRequest $createRequest): void
    {
        $this->expectException(ValidationException::class);

        $createRequest->name = null;

        $createRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoContent(CreateRequest $createRequest): void
    {
        $this->expectException(ValidationException::class);

        $createRequest->content = null;

        $createRequest->validate(true);
    }
}
