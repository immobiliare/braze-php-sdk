<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Canvas;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class ListItem extends BaseObject
{
    public ?string $id = null;

    public ?DateTimeInterface $last_edited = null;

    public ?string $name = null;

    /** @var ?string[] */
    public ?array $tags = null;
}
