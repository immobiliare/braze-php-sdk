<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

/**
 * @see https://www.braze.com/docs/api/objects_filters/recipient_object/
 */
class Recipient extends BaseObject
{
    /** @var ?UserAlias */
    public $user_alias;

    /** @var ?string */
    public $external_user_id;

    /**
     * Only for campaigns and messages
     *
     * @var ?array
     */
    public $trigger_properties;

    /**
     * Only for canvas
     *
     * @var ?array
     */
    public $canvas_entry_properties;

    /**
     * Not included in documentation. Maybe available only on /campaigns/trigger/send endpoint
     *
     * @var ?bool
     */
    public $send_to_existing_only;

    /**
     * Not included in documentation. Maybe available only on /campaigns/trigger/send endpoint
     *
     * @var ?array
     */
    public $attributes;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_user_id && null === $this->user_alias) {
            throw new ValidationException('One of "external_user_id" or "user_alias" fields is required');
        }
    }
}
