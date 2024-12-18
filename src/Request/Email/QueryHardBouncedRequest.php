<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Email;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class QueryHardBouncedRequest extends BaseRequest
{
    public ?DateTimeInterface $start_date = null;

    public ?DateTimeInterface $end_date = null;

    public ?int $limit = null;

    public ?int $offset = null;

    public ?string $email = null;
}
