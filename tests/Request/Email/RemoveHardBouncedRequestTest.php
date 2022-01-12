<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Email;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Email\RemoveHardBouncedRequest;
use PHPUnit\Framework\TestCase;

class RemoveHardBouncedRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(RemoveHardBouncedRequest $removeHardBouncedRequest): void
    {
        $removeHardBouncedRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEmail(RemoveHardBouncedRequest $removeHardBouncedRequest): void
    {
        $this->expectException(ValidationException::class);

        $removeHardBouncedRequest->email = null;

        $removeHardBouncedRequest->validate(true);
    }

    public function validProvider(): array
    {
        $removeHardBouncedRequest1 = new RemoveHardBouncedRequest();

        $removeHardBouncedRequest1->email = 'email';

        return [
            [$removeHardBouncedRequest1]
        ];
    }
}
