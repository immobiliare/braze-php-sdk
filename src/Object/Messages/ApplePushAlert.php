<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ApplePushAlert extends BaseRequest
{
    /** @var ?string */
    public $body;

    /** @var ?string */
    public $title;

    /** @var ?string */
    public $title_loc_key;

    /** @var ?string[] */
    public $title_loc_args;

    /** @var ?string */
    public $action_loc_key;

    /** @var ?string */
    public $loc_key;

    /** @var ?string[] */
    public $loc_args;
}
