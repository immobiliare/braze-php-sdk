<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Campaigns;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class DetailsResponse extends BaseResponse
{
    /** @var ?DateTimeInterface */
    public $created_at;

    /** @var ?DateTimeInterface */
    public $updated_at;

    /** @var ?bool */
    public $archived;

    /** @var ?bool */
    public $draft;

    /** @var ?string */
    public $name;

    /** @var ?string */
    public $description;

    /** @var ?string */
    public $schedule_type;

    /** @var ?array */
    public $channels;

    /** @var ?DateTimeInterface */
    public $first_sent;

    /** @var ?DateTimeInterface */
    public $last_sent;

    /** @var ?string[] */
    public $tags;

    /** @var ?array */
    public $messages;

    /** @var ?array */
    public $conversion_behaviors;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->channels = $params['channels'] ?? [];

        $this->messages = $params['messages'] ?? [];

        $this->conversion_behaviors = $params['conversion_behaviors'] ?? [];
    }
}
