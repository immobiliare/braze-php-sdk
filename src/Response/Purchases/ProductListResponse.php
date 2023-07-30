<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Purchases;

use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ProductListResponse extends BaseResponse
{
    /** @var ?string[] */
    public ?array $products = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        $this->products = $params['products'];
    }
}
