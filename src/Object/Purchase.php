<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;

/**
 * @see https://www.braze.com/docs/api/objects_filters/purchase_object/
 */
class Purchase extends BaseObject
{
    public ?string $external_id = null;

    public ?UserAlias $user_alias = null;

    public ?string $braze_id = null;

    public ?string $app_id = null;

    public ?string $product_id = null;

    public ?string $currency = null;

    public ?float $price = null;

    public ?int $quantity = null;

    public ?DateTimeInterface $time = null;

    public ?array $properties = null;

    public ?bool $_update_existing_only = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id && null === $this->user_alias && null === $this->braze_id) {
            throw new ValidationException('One of "external_id", "user_alias" or "braze_id" fields is required');
        }

        if (null === $this->app_id) {
            throw new ValidationException('The "app_id" field is required');
        }

        if (null === $this->product_id) {
            throw new ValidationException('The "product_id" field is required');
        }

        if (null === $this->currency) {
            throw new ValidationException('The "currency" field is required');
        }

        if (null === $this->price) {
            throw new ValidationException('The "price" field is required');
        }

        if (null === $this->time) {
            throw new ValidationException('The "time" field is required');
        }
    }
}
