<?php

namespace ImmobiliareLabs\BrazeSDK\Response\EmailTemplates;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class InfoResponse extends BaseResponse
{
    /** @var ?string */
    public $email_template_id;

    /** @var ?string */
    public $template_name;

    /** @var ?string */
    public $description;

    /** @var ?string */
    public $subject;

    /** @var ?string */
    public $preheader;

    /** @var ?string */
    public $body;

    /** @var ?string */
    public $plaintext_body;

    /** @var ?bool */
    public $should_inline_css;

    /**
     * @todo: check type: string or array?
     *
     * @var ?array
     */
    public $tags;

    /** @var ?DateTimeImmutable */
    public $created_at;

    /** @var ?DateTimeImmutable */
    public $updated_at;

    /**
     * @throws Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params, $allowExtraProperties);

        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        if (isset($params['updated_at']) && is_string($params['updated_at'])) {
            $this->updated_at = new DateTimeImmutable($params['updated_at']);
        }

        if (isset($params['tags']) && is_array($params['tags'])) {
            $this->tags = $params['tags'];
        }
    }
}
