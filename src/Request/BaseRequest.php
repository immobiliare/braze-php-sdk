<?php

namespace ImmobiliareLabs\BrazeSDK\Request;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

abstract class BaseRequest extends BaseObject
{
    public function validate(bool $strict): void
    {
    }

    protected function validateCollection(?iterable $collection, bool $strict): bool
    {
        if (empty($collection)) {
            return false;
        }

        $looseValid = false;

        foreach ($collection as $item) {
            try {
                $item->validate($strict);
                $looseValid = true;
            } catch (ValidationException $e) {
                if ($strict) {
                    throw $e;
                }
            }
        }

        return $looseValid;
    }
}
