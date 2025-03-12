<?php

declare(strict_types=1);

namespace ImmobiliareLabs\BrazeSDK\Object\ValueObject;

use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class RateLimit extends BaseObject
{
    private const LIMIT_HEADER = 'X-RateLimit-Limit';
    private const REMAINING_HEADER = 'X-RateLimit-Remaining';
    private const RESET_HEADER = 'X-RateLimit-Reset';

    public ?int $limit = null;
    public ?int $remaining = null;
    public ?int $reset = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (key_exists(self::LIMIT_HEADER, $params)) {
            $this->limit = $params[self::LIMIT_HEADER];
        }
        if (key_exists(self::REMAINING_HEADER, $params)) {
            $this->remaining = $params[self::REMAINING_HEADER];
        }
        if (key_exists(self::RESET_HEADER, $params)) {
            $this->reset = $params[self::RESET_HEADER];
        }
    }
}
