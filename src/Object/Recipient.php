<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

/**
 * @see https://www.braze.com/docs/api/objects_filters/recipient_object/
 */
class Recipient extends BaseObject
{
    public ?UserAlias $user_alias = null;

    public ?string $external_user_id = null;

    /**
     * Only for campaigns and messages
     */
    public ?array $trigger_properties = null;

    /**
     * Only for canvas
     */
    public ?array $canvas_entry_properties = null;

    /**
     * Not well documented.
     * Maybe available only on /campaigns/trigger/send and /canvas/trigger/send endpoints.
     */
    public ?bool $send_to_existing_only = null;

    /**
     * Not well documented.
     * Maybe available only on /campaigns/trigger/send and /canvas/trigger/send endpoints.
     * We may remove the array type in the next major release.
     */
    public array|UserAttributes|null $attributes = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_user_id && null === $this->user_alias) {
            throw new ValidationException('One of "external_user_id" or "user_alias" fields is required');
        }
    }
}
