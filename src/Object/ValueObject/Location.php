<?php

namespace ImmobiliareLabs\BrazeSDK\Object\ValueObject;

use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class Location extends BaseObject
{
    /** @var ?string */
    public $longitude;

    /** @var ?string */
    public $latitude;
}
