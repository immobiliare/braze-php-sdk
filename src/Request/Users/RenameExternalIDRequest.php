<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Users;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Object\Users\ExternalIDRename;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class RenameExternalIDRequest extends BaseRequest
{
    /** @var ?ExternalIDRename[] */
    public ?array $external_id_renames = null;

    public function validate(bool $strict): void
    {
        parent::validate($strict);

        if (null === $this->external_id_renames) {
            throw new ValidationException('The "external_id_renames" field is required');
        }

        $externalIdRenamesLooseValid = $this->validateCollection($this->external_id_renames, $strict);

        if (!$externalIdRenamesLooseValid) {
            throw new ValidationException('At least one "external id rename" must be valid');
        }
    }
}
