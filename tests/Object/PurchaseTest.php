<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Event;
use ImmobiliareLabs\BrazeSDK\Object\Purchase;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;
use PHPUnit\Framework\TestCase;

final class PurchaseTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(Purchase $purchase): void
    {
        $purchase->validate(true);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoUserIdentifier(Purchase $purchase): void
    {
        $this->expectException(ValidationException::class);
        $purchase->external_id = null;
        $purchase->user_alias = null;
        $purchase->braze_id = null;

        $purchase->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoAppID(Purchase $purchase): void
    {
        $this->expectException(ValidationException::class);
        $purchase->app_id = null;

        $purchase->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoProductID(Purchase $purchase): void
    {
        $this->expectException(ValidationException::class);
        $purchase->product_id = null;

        $purchase->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoCurrency(Purchase $purchase): void
    {
        $this->expectException(ValidationException::class);
        $purchase->currency = null;

        $purchase->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoPrice(Purchase $purchase): void
    {
        $this->expectException(ValidationException::class);
        $purchase->price = null;

        $purchase->validate(false);
    }

    /**
     * @dataProvider validProvider
     */
    public function testNoTime(Purchase $purchase): void
    {
        $this->expectException(ValidationException::class);
        $purchase->time = null;

        $purchase->validate(false);
    }

    public function validProvider(): array
    {
        $purchase1 = new Purchase();
        $purchase1->external_id = 'external_id';
        $purchase1->app_id = 'app_id';
        $purchase1->product_id = 'product_id';
        $purchase1->currency = 'euro';
        $purchase1->price = 10.0;
        $purchase1->time = new \DateTimeImmutable();

        $purchase2 = new Purchase();
        $purchase2->user_alias = new UserAlias();
        $purchase2->user_alias->alias_name = 'alias_name';
        $purchase2->user_alias->alias_label = 'alias_label';
        $purchase2->app_id = 'app_id';
        $purchase2->product_id = 'product_id';
        $purchase2->currency = 'euro';
        $purchase2->price = 10.0;
        $purchase2->time = new \DateTimeImmutable();

        $purchase3 = new Purchase();
        $purchase3->braze_id = 'braze_id';
        $purchase3->app_id = 'app_id';
        $purchase3->product_id = 'product_id';
        $purchase3->currency = 'euro';
        $purchase3->price = 10.0;
        $purchase3->time = new \DateTimeImmutable();

        return [
            [$purchase1],
            [$purchase2],
            [$purchase3],
        ];
    }
}
