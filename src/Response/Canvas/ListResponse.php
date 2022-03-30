<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Canvas;

use ImmobiliareLabs\BrazeSDK\Object\Canvas\ListItem;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?ListItem[] */
    public ?array $canvases = null;
}
