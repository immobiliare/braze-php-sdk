<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Campaigns;

use DateTimeImmutable;
use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    public ?DateTimeInterface $created_at = null;

    public ?DateTimeInterface $updated_at = null;

    public ?bool $archived = null;

    public ?bool $draft = null;

    public ?string $name = null;

    public ?string $description = null;

    public ?string $schedule_type = null;

    public ?array $channels = null;

    public ?DateTimeInterface $first_sent = null;

    public ?DateTimeInterface $last_sent = null;

    /** @var ?string[] */
    public ?array $tags = null;

    public ?array $messages = null;

    public ?array $conversion_behaviors = null;

    /**
     * @throws \Exception
     */
    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        if (isset($params['created_at']) && is_string($params['created_at'])) {
            $this->created_at = new DateTimeImmutable($params['created_at']);
        }

        if (isset($params['updated_at']) && is_string($params['updated_at'])) {
            $this->updated_at = new DateTimeImmutable($params['updated_at']);
        }

        if (isset($params['first_sent']) && is_string($params['first_sent'])) {
            $this->first_sent = new DateTimeImmutable($params['first_sent']);
        }

        if (isset($params['last_sent']) && is_string($params['last_sent'])) {
            $this->last_sent = new DateTimeImmutable($params['last_sent']);
        }

        parent::fillFromArray($params);

        $this->channels = $params['channels'] ?? [];

        $this->messages = $params['messages'] ?? [];

        $this->conversion_behaviors = $params['conversion_behaviors'] ?? [];
    }
}
