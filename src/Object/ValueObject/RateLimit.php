<?php

declare(strict_types=1);

namespace ImmobiliareLabs\BrazeSDK\Object\ValueObject;

use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class RateLimit extends BaseObject
{
    private const LIMIT_HEADER = 'x-ratelimit-limit';
    private const REMAINING_HEADER = 'x-ratelimit-remaining';
    private const RESET_HEADER = 'x-ratelimit-reset';

    public ?int $limit = null;
    public ?int $remaining = null;
    public ?int $reset = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (key_exists(self::LIMIT_HEADER, $params)) {
            $this->limit = (int) $params[self::LIMIT_HEADER][0];
        }
        if (key_exists(self::REMAINING_HEADER, $params)) {
            $this->remaining = (int) $params[self::REMAINING_HEADER][0];
        }
        if (key_exists(self::RESET_HEADER, $params)) {
            $this->reset = (int) $params[self::RESET_HEADER][0];
        }
    }
}
