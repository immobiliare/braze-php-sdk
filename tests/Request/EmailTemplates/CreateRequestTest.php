<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\EmailTemplates\CreateRequest;
use PHPUnit\Framework\TestCase;

class CreateRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(CreateRequest $createRequest): void
    {
        $createRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTemplateName(CreateRequest $createRequest): void
    {
        $this->expectException(ValidationException::class);

        $createRequest->template_name = null;

        $createRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoSubject(CreateRequest $createRequest): void
    {
        $this->expectException(ValidationException::class);

        $createRequest->subject = null;

        $createRequest->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoBody(CreateRequest $createRequest): void
    {
        $this->expectException(ValidationException::class);

        $createRequest->body = null;

        $createRequest->validate(true);
    }

    public function validProvider(): array
    {
        $createRequest = new CreateRequest();
        $createRequest->template_name = 'template_name';
        $createRequest->subject = 'subject';
        $createRequest->body = 'body';

        return [
            [$createRequest],
        ];
    }
}
