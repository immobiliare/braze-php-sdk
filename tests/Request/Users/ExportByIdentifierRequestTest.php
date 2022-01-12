<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Request\Users\ExportByIdentifierRequest;
use PHPUnit\Framework\TestCase;

class ExportByIdentifierRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ExportByIdentifierRequest $exportByIdentifierRequest): void
    {
        $exportByIdentifierRequest->validate(true);
    }

    public function validProvider(): array
    {
        $exportByIdentifierRequest = new ExportByIdentifierRequest();
        $exportByIdentifierRequest->external_ids = ['external_id1'];

        return [
            [$exportByIdentifierRequest],
        ];
    }
}
