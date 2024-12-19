<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Campaigns;

use ImmobiliareLabs\BrazeSDK\Object\Campaigns\ListItem;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?ListItem[] */
    public ?array $campaigns = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->campaigns = [];

        if (isset($params['campaigns']) && is_array($params['campaigns'])) {
            foreach ($params['campaigns'] as $campaignParams) {
                $this->campaigns[] = ListItem::fromArray($campaignParams);
            }
        }
    }
}
