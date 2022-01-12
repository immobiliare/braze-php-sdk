<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Canvas;

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

    /** @var ?string[] */
    public $tags;
}
