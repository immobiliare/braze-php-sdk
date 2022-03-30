<?php

namespace ImmobiliareLabs\BrazeSDK\Response\EmailTemplates;

use DateTimeImmutable;
use Exception;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class InfoResponse extends BaseResponse
{
    public ?string $email_template_id = null;

    public ?string $template_name = null;

    public ?string $description = null;

    public ?string $subject = null;

    public ?string $preheader = null;

    public ?string $body = null;

    public ?string $plaintext_body = null;

    public ?bool $should_inline_css = null;

    /**
     * @todo: check type: string or array?
     *
     */
    public ?array $tags = null;

    public ?DateTimeImmutable $created_at = null;

    public ?DateTimeImmutable $updated_at = null;

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
