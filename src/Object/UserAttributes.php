<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\ValueObject\Location;

/**
 * @see https://www.braze.com/docs/api/objects_filters/user_attributes_object/
 */
class UserAttributes extends BaseObject
{
    /** @var ?string */
    public $external_id;

    /** @var ?UserAlias */
    public $user_alias;

    /** @var ?string */
    public $braze_id;

    /** @var ?bool */
    public $_update_existing_only;

    /** @var ?bool */
    public $push_token_import;

    // Braze user profile fields

    /** @var ?string */
    public $country;

    /** @var ?Location */
    public $current_location;

    /** @var ?DateTimeInterface */
    public $date_of_first_session;

    /** @var ?DateTimeInterface */
    public $date_of_last_session;

    /** @var ?DateTimeInterface */
    public $dob;

    /** @var ?string */
    public $email;

    /** @var ?string */
    public $email_subscribe;

    /** @var ?bool */
    public $email_open_tracking_disabled;

    /** @var ?bool */
    public $email_click_tracking_disabled;

    /** @var ?string */
    public $facebook;

    /** @var ?string */
    public $first_name;

    /** @var ?string */
    public $gender;

    /** @var ?string */
    public $home_city;

    /** @var ?string */
    public $image_url;

    /** @var ?string */
    public $language;

    /** @var ?string */
    public $last_name;

    /** @var ?DateTimeInterface */
    public $marked_email_as_spam_at;

    /** @var ?string */
    public $phone;

    /** @var ?string */
    public $push_subscribe;

    /** @var ?array */
    public $push_tokens;

    /** @var ?string */
    public $time_zone;

    /** @var ?string */
    public $twitter;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id && null === $this->user_alias && null === $this->braze_id) {
            throw new ValidationException('One of "external_id", "user_alias" or "braze_id" fields is required');
        }
    }

    public function jsonSerialize()
    {
        $dataToSerialize = parent::jsonSerialize();

        if (null !== $this->dob) {
            $dataToSerialize['dob'] = $this->dob->format('Y-m-d');
        }

        return $dataToSerialize;
    }
}
