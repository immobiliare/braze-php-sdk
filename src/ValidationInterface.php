<?php

namespace ImmobiliareLabs\BrazeSDK;

interface ValidationInterface
{
    public function validate(bool $strict): void;
}
