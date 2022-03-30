<?php

namespace ImmobiliareLabs\BrazeSDK\Object\EmailTemplates;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Object\BaseObject;

class ListItem extends BaseObject
{
    /** @var ?string */
    public $email_template_id;

    /** @var ?string */
    public $template_name;

    /** @var ?DateTimeImmutable */
    public $created_at;

    /** @var ?DateTimeImmutable */
    public $updated_at;

    /** @var ?array */
    public $tags;

    /**
     * @throws Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        if (isset($params['updated_at']) && is_string($params['updated_at'])) {
            $this->updated_at = new DateTimeImmutable($params['updated_at']);
        }

        if (isset($params['tags']) && is_array($params['tags'])) {
            $this->tags = $params['tags'];
        }

        parent::fillFromArray($params, $allowExtraProperties);
    }
}
