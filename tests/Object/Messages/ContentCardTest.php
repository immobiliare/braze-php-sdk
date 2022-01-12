<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Messages\ContentCard;
use PHPUnit\Framework\TestCase;

class ContentCardTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ContentCard $contentCard): void
    {
        $contentCard->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoType(ContentCard $contentCard): void
    {
        $this->expectException(ValidationException::class);

        $contentCard->type = null;

        $contentCard->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTitle(ContentCard $contentCard): void
    {
        $this->expectException(ValidationException::class);

        $contentCard->title = null;

        $contentCard->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoDescription(ContentCard $contentCard): void
    {
        $this->expectException(ValidationException::class);

        $contentCard->description = null;

        $contentCard->validate(true);
    }

    public function validProvider(): array
    {
        $contentCard1 = new ContentCard();

        $contentCard1->type = 'type';
        $contentCard1->title = 'title';
        $contentCard1->description = 'description';

        return [
            [$contentCard1]
        ];
    }
}
