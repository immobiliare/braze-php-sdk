<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\UpdateRequest;
use PHPUnit\Framework\TestCase;

class UpdateRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(UpdateRequest $updateRequest): void
    {
        $updateRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoEmailTemplateID(UpdateRequest $updateRequest): void
    {
        $this->expectException(ValidationException::class);

        $updateRequest->email_template_id = null;

        $updateRequest->validate(true);
    }

    public function validProvider(): array
    {
        $updateRequest = new UpdateRequest();
        $updateRequest->email_template_id = 'email_template_id';

        return [
            [$updateRequest],
        ];
    }
}
