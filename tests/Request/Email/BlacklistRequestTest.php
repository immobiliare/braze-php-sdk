<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Email;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Email\BlacklistRequest;
use PHPUnit\Framework\TestCase;

class BlacklistRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(BlacklistRequest $blacklistRequest): void
    {
        $blacklistRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEmail(BlacklistRequest $blacklistRequest): void
    {
        $this->expectException(ValidationException::class);

        $blacklistRequest->email = null;

        $blacklistRequest->validate(true);
    }

    public function validProvider(): array
    {
        $blacklistRequest1 = new BlacklistRequest();

        $blacklistRequest1->email = 'email';

        return [
            [$blacklistRequest1]
        ];
    }
}
