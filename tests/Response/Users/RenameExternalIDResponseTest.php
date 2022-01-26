<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\Users\RenameExternalIDResponse;
use PHPUnit\Framework\TestCase;

class RenameExternalIDResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new RenameExternalIDResponse();

        $externalIds = ['external_id'];
        $renameErrors = ['rename_error'];

        $response->fillFromArray([
            'external_ids' => $externalIds,
            'rename_errors' => $renameErrors,
        ]);

        $this->assertSame($externalIds, $response->external_ids);
        $this->assertSame($renameErrors, $response->rename_errors);
    }
}
