<?php

namespace ImmobiliareLabs\BrazeSDK\Request;

trait HasRecipients
{
    private function hasRecipients(): bool
    {
        if (null === $this->recipients) {
            return false;
        }

        if (!is_array($this->recipients)) {
            return false;
        }

        return count($this->recipients) > 0;
    }
}
