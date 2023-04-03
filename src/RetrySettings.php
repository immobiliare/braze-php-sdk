<?php

namespace ImmobiliareLabs\BrazeSDK;

class RetrySettings
{
    private int $retriesAllowed;
    private int $sleepSeconds;

    public function __construct(int $retriesAllowed, int $sleepSeconds)
    {
        $this->retriesAllowed = max($retriesAllowed, 0);
        $this->sleepSeconds = max($sleepSeconds, 0);
    }

    public function getRetriesAllowed(): int
    {
        return $this->retriesAllowed;
    }

    public function getSleepSeconds(): int
    {
        return $this->sleepSeconds;
    }
}
