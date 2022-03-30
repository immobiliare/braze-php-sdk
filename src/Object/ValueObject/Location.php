<?php

namespace ImmobiliareLabs\BrazeSDK\Object\ValueObject;

use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class Location extends BaseObject
{
    public ?string $longitude = null;

    public ?string $latitude = null;
}
