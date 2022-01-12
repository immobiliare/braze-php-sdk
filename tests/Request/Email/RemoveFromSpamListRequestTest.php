<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Email;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Email\RemoveFromSpamListRequest;
use PHPUnit\Framework\TestCase;

class RemoveFromSpamListRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(RemoveFromSpamListRequest $removeFromSpamListRequest): void
    {
        $removeFromSpamListRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEmail(RemoveFromSpamListRequest $removeFromSpamListRequest): void
    {
        $this->expectException(ValidationException::class);

        $removeFromSpamListRequest->email = null;

        $removeFromSpamListRequest->validate(true);
    }

    public function validProvider(): array
    {
        $removeFromSpamListRequest1 = new RemoveFromSpamListRequest();

        $removeFromSpamListRequest1->email = 'email';

        return [
            [$removeFromSpamListRequest1]
        ];
    }
}
