<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;
use ImmobiliareLabs\BrazeSDK\Object\UserAlias;

class MergeIdentifier extends BaseObject
{
    public ?string $external_id = null;

    public ?UserAlias $user_alias = null;

    public ?string $email = null;

    /** @var ?string[] */
    public ?array $prioritization = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id && null === $this->user_alias && null === $this->email) {
            throw new ValidationException('One of "external_id", "user_alias" or "email" fields is required');
        }

        if (\count(array_filter([$this->external_id, $this->user_alias, $this->email])) > 1) {
            throw new ValidationException('Only one of "external_id", "user_alias" and "email" fields must be set');
        }

        if (null !== $this->email && null === $this->prioritization) {
            throw new ValidationException('If an "email" is specified as an identifier, an additional "prioritization" value is required');
        }

        if (null !== $this->prioritization) {
            foreach ($this->prioritization as $prioritizationItem) {
                if (!in_array($prioritizationItem, ['identified', 'unidentified', 'most_recently_updated'])) {
                    throw new ValidationException('The allowed values for the "prioritization" array are: "identified", "unidentified", "most_recently_updated"');
                }
            }

            if (\count(array_intersect($this->prioritization, ['identified', 'unidentified'])) > 1) {
                throw new ValidationException('Only one of "identified" and "unidentified" options may exist in the prioritization array');
            }
        }

        $this->user_alias?->validate($strict);
    }
}
