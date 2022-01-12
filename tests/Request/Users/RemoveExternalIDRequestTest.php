<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\NewUserAlias;
use ImmobiliareLabs\BrazeSDK\Request\Users\RemoveExternalIDRequest;
use PHPUnit\Framework\TestCase;

class RemoveExternalIDRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(RemoveExternalIDRequest $removeExternalIDRequest): void
    {
        $removeExternalIDRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoExternalIDs(RemoveExternalIDRequest $removeExternalIDRequest): void
    {
        $this->expectException(ValidationException::class);

        $removeExternalIDRequest->external_ids = null;

        $removeExternalIDRequest->validate(true);
    }

    public function validProvider(): array
    {
        $removeExternalIDRequest1 = new RemoveExternalIDRequest();
        $removeExternalIDRequest1->external_ids = ['external_id1', 'external_id2'];

        return [
            [$removeExternalIDRequest1],
        ];
    }
}
