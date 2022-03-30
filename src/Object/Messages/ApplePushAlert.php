<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ApplePushAlert extends BaseRequest
{
    public ?string $body = null;

    public ?string $title = null;

    public ?string $title_loc_key = null;

    /** @var ?string[] */
    public ?array $title_loc_args = null;

    public ?string $action_loc_key = null;

    public ?string $loc_key = null;

    /** @var ?string[] */
    public ?array $loc_args = null;
}
