<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\InfoRequest;
use PHPUnit\Framework\TestCase;

class InfoRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(InfoRequest $infoRequest): void
    {
        $infoRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEmailTemplateID(InfoRequest $infoRequest): void
    {
        $this->expectException(ValidationException::class);

        $infoRequest->email_template_id = null;

        $infoRequest->validate(true);
    }

    public function validProvider(): array
    {
        $infoRequest = new InfoRequest();
        $infoRequest->email_template_id = 'email_template_id';

        return [
            [$infoRequest],
        ];
    }
}
