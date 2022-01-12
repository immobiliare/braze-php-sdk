<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Email;

use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class QueryUnsubscribedRequest extends BaseRequest
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
    public $sort_direction;

    /** @var ?string */
    public $email;
}
