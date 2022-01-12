<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Campaigns;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class ListItem extends BaseObject
{
    /** @var ?string */
    public $id;

    /** @var ?DateTimeInterface */
    public $last_edited;

    /** @var ?string */
    public $name;

    /** @var ?bool */
    public $is_api_campaign;

    /** @var ?string[] */
    public $tags;
}
