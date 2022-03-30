<?php

namespace ImmobiliareLabs\BrazeSDK\Request\ContentBlocks;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    public ?DateTimeInterface $modified_after = null;

    public ?DateTimeInterface $modified_before = null;

    public ?int $limit = null;

    public ?int $offset = null;
}
