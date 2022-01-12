<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\Users\ExportBySegmentRequest;
use PHPUnit\Framework\TestCase;

class ExportBySegmentRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ExportBySegmentRequest $exportBySegmentRequest): void
    {
        $exportBySegmentRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSegmentId(ExportBySegmentRequest $exportBySegmentRequest): void
    {
        $this->expectException(ValidationException::class);

        $exportBySegmentRequest->segment_id = null;

        $exportBySegmentRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoFieldsToExport(ExportBySegmentRequest $exportBySegmentRequest): void
    {
        $this->expectException(ValidationException::class);

        $exportBySegmentRequest->fields_to_export = null;

        $exportBySegmentRequest->validate(true);
    }

    public function validProvider(): array
    {
        $exportBySegmentRequest1 = new ExportBySegmentRequest();

        $exportBySegmentRequest1->segment_id = 'segment_id';
        $exportBySegmentRequest1->fields_to_export = ['fields_to_export'];

        return [
            [$exportBySegmentRequest1]
        ];
    }
}
