<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Response\Users;

use ImmobiliareLabs\BrazeSDK\Response\Users\RemoveExternalIDResponse;
use PHPUnit\Framework\TestCase;

class RemoveExternalIDResponseTest extends TestCase
{
    public function testFillFromArray(): void
    {
        $response = new RemoveExternalIDResponse();

        $removedIds = ['removed_id'];
        $removalErrors = ['removal_error'];

        $response->fillFromArray([
            'removed_ids' => $removedIds,
            'removal_errors' => $removalErrors,
        ]);

        $this->assertSame($removedIds, $response->removed_ids);
        $this->assertSame($removalErrors, $response->removal_errors);
    }
}
