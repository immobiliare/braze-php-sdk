<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\ExternalIDRename;
use PHPUnit\Framework\TestCase;

class ExternalIDRenameTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ExternalIDRename $externalIDRename): void
    {
        $externalIDRename->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCurrentExternalID(ExternalIDRename $externalIDRename): void
    {
        $this->expectException(ValidationException::class);

        $externalIDRename->current_external_id = null;

        $externalIDRename->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoNewExternalID(ExternalIDRename $externalIDRename): void
    {
        $this->expectException(ValidationException::class);

        $externalIDRename->new_external_id = null;

        $externalIDRename->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testExternalIDChange(ExternalIDRename $externalIDRename): void
    {
        $this->expectException(ValidationException::class);

        $externalIDRename->new_external_id = $externalIDRename->current_external_id;

        $externalIDRename->validate(false);
    }

    public function validProvider(): array
    {
        $externalIDRename = new ExternalIDRename();
        $externalIDRename->current_external_id = 'current_external_id';
        $externalIDRename->new_external_id = 'new_external_id';

        return [
            [$externalIDRename],
        ];
    }
}
