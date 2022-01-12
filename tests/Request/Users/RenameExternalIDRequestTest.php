<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\AliasToIdentify;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use ImmobiliareLabs\BrazeSDK\Object\Users\ExternalIDRename;
use ImmobiliareLabs\BrazeSDK\Request\Users\RenameExternalIDRequest;
use PHPUnit\Framework\TestCase;

class RenameExternalIDRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(RenameExternalIDRequest $renameExternalIDRequest): void
    {
        $renameExternalIDRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUserAliases(RenameExternalIDRequest $renameExternalIDRequest): void
    {
        $this->expectException(ValidationException::class);

        $renameExternalIDRequest->external_id_renames = null;

        $renameExternalIDRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValidLoose(RenameExternalIDRequest $renameExternalIDRequest): void
    {
        foreach ($renameExternalIDRequest->external_id_renames as $event) {
            $event->current_external_id = null;
            break;
        }

        $renameExternalIDRequest->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNotValidLoose(RenameExternalIDRequest $renameExternalIDRequest): void
    {
        $this->expectException(ValidationException::class);

        foreach ($renameExternalIDRequest->external_id_renames as $event) {
            $event->current_external_id = null;
        }

        $renameExternalIDRequest->validate(false);
    }

    public function validProvider(): array
    {
        $externalIDRename1 = new ExternalIDRename();
        $externalIDRename1->current_external_id = 'current_external_id1';
        $externalIDRename1->new_external_id = 'new_external_id1';

        $externalIDRename2 = new ExternalIDRename();
        $externalIDRename2->current_external_id = 'current_external_id2';
        $externalIDRename2->new_external_id = 'new_external_id2';

        $renameExternalIDRequest1 = new RenameExternalIDRequest();
        $renameExternalIDRequest1->external_id_renames = [$externalIDRename1, $externalIDRename2];

        return [
            [$renameExternalIDRequest1],
        ];
    }
}
