<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Users\ExportByGlobalControlGroupRequest;
use PHPUnit\Framework\TestCase;

class ExportByGlobalControlGroupRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ExportByGlobalControlGroupRequest $exportByGlobalControlGroupRequest): void
    {
        $exportByGlobalControlGroupRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoFieldsToExport(ExportByGlobalControlGroupRequest $exportByGlobalControlGroupRequest): void
    {
        $this->expectException(ValidationException::class);

        $exportByGlobalControlGroupRequest->fields_to_export = null;

        $exportByGlobalControlGroupRequest->validate(true);
    }

    public function validProvider(): array
    {
        $exportByGlobalControlGroupRequest1 = new ExportByGlobalControlGroupRequest();

        $exportByGlobalControlGroupRequest1->fields_to_export = ['fields_to_export'];

        return [
            [$exportByGlobalControlGroupRequest1]
        ];
    }
}
