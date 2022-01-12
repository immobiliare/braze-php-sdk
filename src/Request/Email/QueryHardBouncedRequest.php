<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Email;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class QueryHardBouncedRequest extends BaseRequest
{
    /** @var ?DateTimeInterface */
    public $start_date;

    /** @var ?DateTimeInterface */
    public $end_date;

    /** @var ?int */
    public $limit;

    /** @var ?int */
    public $offset;

    /** @var ?string */
    public $email;
}
