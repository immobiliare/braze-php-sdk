<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Campaigns;

use ImmobiliareLabs\BrazeSDK\Object\Campaigns\ListItem;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?ListItem[] */
    public $campaigns;
}
