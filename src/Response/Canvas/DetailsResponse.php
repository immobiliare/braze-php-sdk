<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Canvas;

use DateTimeImmutable;
use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    public ?DateTimeInterface $created_at = null;

    public ?DateTimeInterface $updated_at = null;

    public ?string $name = null;

    public ?string $description = null;

    public ?bool $archived = null;

    public ?bool $draft = null;

    public ?string $schedule_type = null;

    public ?DateTimeInterface $first_entry = null;

    public ?DateTimeInterface $last_entry = null;

    public ?array $channels = null;

    public ?array $variants = null;

    /** @var ?string[] */
    public ?array $tags = null;

    public ?array $steps = null;

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

        if (isset($params['first_entry']) && is_string($params['first_entry'])) {
            $this->first_entry = new DateTimeImmutable($params['first_entry']);
        }

        if (isset($params['last_entry']) && is_string($params['last_entry'])) {
            $this->last_entry = new DateTimeImmutable($params['last_entry']);
        }

        parent::fillFromArray($params);

        $this->channels = $params['channels'] ?? [];

        $this->variants = $params['variants'] ?? [];

        $this->steps = $params['steps'] ?? [];
    }
}
