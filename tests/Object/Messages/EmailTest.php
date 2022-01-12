<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(Email $email): void
    {
        $email->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoAppID(Email $email): void
    {
        $this->expectException(ValidationException::class);
        $email->app_id = null;

        $email->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoFrom(Email $email): void
    {
        $this->expectException(ValidationException::class);
        $email->from = null;

        $email->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoBodyOrTemplate(Email $email): void
    {
        $this->expectException(ValidationException::class);
        $email->body = null;
        $email->email_template_id = null;

        $email->validate(false);
    }

    public function validProvider(): array
    {
        $email1 = new Email();
        $email1->app_id = 'app_id';
        $email1->from = 'from';
        $email1->body = 'body';

        $email2 = new Email();
        $email2->app_id = 'app_id';
        $email2->from = 'from';
        $email2->email_template_id = 'email_template_id';

        return [
            [$email1],
            [$email2],
        ];
    }
}
