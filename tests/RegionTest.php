<?php

namespace ImmobiliareLabs\BrazeSDK\Test;

use ImmobiliareLabs\BrazeSDK\Exception\NotAvailableRegionException;
use ImmobiliareLabs\BrazeSDK\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    public function testCreationException(): void
    {
        $this->expectException(NotAvailableRegionException::class);

        new Region('https://rest.fra-00.braze.eu');
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testForcedCreation(): void
    {
        new Region('https://rest.fra-00.braze.eu', true);
    }
}
