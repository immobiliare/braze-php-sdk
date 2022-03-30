<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Event;
use ImmobiliareLabs\BrazeSDK\Object\Purchase;
use ImmobiliareLabs\BrazeSDK\Object\UserAttributes;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class TrackRequest extends BaseRequest
{
    /** @var ?UserAttributes[] */
    public ?array $attributes = null;

    /** @var ?Event[] */
    public ?array $events = null;

    /** @var ?Purchase[] */
    public ?array $purchases = null;

    public function validate(bool $strict): void
    {
        if (empty($this->attributes) && empty($this->events) && empty($this->purchases)) {
            throw new ValidationException('At least one of attributes, events and purchases must be non empty');
        }

        $attributesLooseValid = $this->validateCollection($this->attributes, $strict);
        $eventsLooseValid = $this->validateCollection($this->events, $strict);
        $purchasesLooseValid = $this->validateCollection($this->purchases, $strict);

        $looseValid = $attributesLooseValid || $eventsLooseValid || $purchasesLooseValid;

        if (!$looseValid) {
            throw new ValidationException('At least one attribute, event or purchase must be valid');
        }
    }
}
