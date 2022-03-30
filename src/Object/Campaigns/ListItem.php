<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Campaigns;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class ListItem extends BaseObject
{
    public ?string $id = null;

    public ?DateTimeInterface $last_edited = null;

    public ?string $name = null;

    public ?bool $is_api_campaign = null;

    /** @var ?string[] */
    public ?array $tags = null;
}
