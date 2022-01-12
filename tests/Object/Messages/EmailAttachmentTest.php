<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\EmailAttachment;
use PHPUnit\Framework\TestCase;

class EmailAttachmentTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(EmailAttachment $emailAttachment): void
    {
        $emailAttachment->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoFilename(EmailAttachment $emailAttachment): void
    {
        $this->expectException(ValidationException::class);
        $emailAttachment->file_name = null;

        $emailAttachment->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoURL(EmailAttachment $emailAttachment): void
    {
        $this->expectException(ValidationException::class);
        $emailAttachment->url = null;

        $emailAttachment->validate(false);
    }

    public function validProvider(): array
    {
        $emailAttachment1 = new EmailAttachment();
        $emailAttachment1->file_name = 'file_name';
        $emailAttachment1->url = 'url';

        return [
            [$emailAttachment1],
        ];
    }
}
