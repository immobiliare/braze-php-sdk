<?php

namespace ImmobiliareLabs\BrazeSDK\Request\ContentBlocks;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    /** @var ?DateTimeInterface */
    public $modified_after;

    /** @var ?DateTimeInterface */
    public $modified_before;

    /** @var ?int */
    public $limit;

    /** @var ?int */
    public $offset;
}
