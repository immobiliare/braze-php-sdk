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
    public ?string $external_id = null;

    public ?UserAlias $user_alias = null;

    public ?string $braze_id = null;

    public ?bool $_update_existing_only = null;

    public ?bool $push_token_import = null;

    // Braze user profile fields

    public ?string $country = null;

    public ?Location $current_location = null;

    public ?DateTimeInterface $date_of_first_session = null;

    public ?DateTimeInterface $date_of_last_session = null;

    public ?DateTimeInterface $dob = null;

    public ?string $email = null;

    public ?string $email_subscribe = null;

    public ?bool $email_open_tracking_disabled = null;

    public ?bool $email_click_tracking_disabled = null;

    public ?string $facebook = null;

    public ?string $first_name = null;

    public ?string $gender = null;

    public ?string $home_city = null;

    public ?string $image_url = null;

    public ?string $language = null;

    public ?string $last_name = null;

    public ?DateTimeInterface $marked_email_as_spam_at = null;

    public ?string $phone = null;

    public ?string $push_subscribe = null;

    public ?array $push_tokens = null;

    public ?string $time_zone = null;

    public ?string $twitter = null;

    private array $_customAttributes = [];

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id && null === $this->user_alias && null === $this->braze_id) {
            throw new ValidationException('One of "external_id", "user_alias" or "braze_id" fields is required');
        }
    }

    public function jsonSerialize(): mixed
    {
        $dataToSerialize = parent::jsonSerialize();

        if (null !== $this->dob) {
            $dataToSerialize['dob'] = $this->dob->format('Y-m-d');
        }

        return array_merge($dataToSerialize, $this->_customAttributes);
    }

    /**
     * To set a custom DateTime attribute use a string in the ISO 8601 format.
     * Using a DateTime object it would not be possible to know if you want
     * to send a date that includes time or not.
     */
    public function setCustomAttribute(string $key, array|bool|float|int|string|null $value): void
    {
        $this->_customAttributes[$key] = $value;
    }

    public function setCustomAttributes(array $customAttributes): void
    {
        foreach ($customAttributes as $key => $value) {
            $this->setCustomAttribute($key, $value);
        }
    }
}
