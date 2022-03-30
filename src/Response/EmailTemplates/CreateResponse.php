<?php

namespace ImmobiliareLabs\BrazeSDK\Response\EmailTemplates;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

/**
 * Not documented
 *
 * @todo: check response content
 */
class CreateResponse extends BaseResponse
{
    /** @var ?string */
    public $email_template_id;

    /** @var ?DateTimeImmutable */
    public $created_at;

    /**
     * @throws Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        parent::fillFromArray($params, $allowExtraProperties);
    }
}
