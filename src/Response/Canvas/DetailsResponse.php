<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Canvas;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    /** @var ?DateTimeInterface */
    public $created_at;

    /** @var ?DateTimeInterface */
    public $updated_at;

    /** @var ?string */
    public $name;

    /** @var ?string */
    public $description;

    /** @var ?bool */
    public $archived;

    /** @var ?bool */
    public $draft;

    /** @var ?string */
    public $schedule_type;

    /** @var ?DateTimeInterface */
    public $first_entry;

    /** @var ?DateTimeInterface */
    public $last_entry;

    /** @var ?array */
    public $channels;

    /** @var ?array */
    public $variants;

    /** @var ?string[] */
    public $tags;

    /** @var ?array */
    public $steps;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->channels = $params['channels'] ?? [];

        $this->variants = $params['variants'] ?? [];

        $this->steps = $params['steps'] ?? [];
    }
}
