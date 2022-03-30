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
    public ?string $email_template_id = null;

    public ?DateTimeImmutable $created_at = null;

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
