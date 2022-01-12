<?php

namespace ImmobiliareLabs\BrazeSDK\Test\Request\Purchases;

use ImmobiliareLabs\BrazeSDK\Request\Purchases\ProductListRequest;
use PHPUnit\Framework\TestCase;

class ProductListRequestTest extends TestCase
{
    /**
     * @dataProvider validProvider
     * @doesNotPerformAssertions
     */
    public function testValid(ProductListRequest $productListRequest): void
    {
        $productListRequest->validate(true);
    }

    public function validProvider(): array
    {
        $productListRequest1 = new ProductListRequest();


        return [
            [$productListRequest1]
        ];
    }
}
