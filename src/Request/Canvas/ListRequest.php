<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Canvas;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    public ?int $page = null;

    public ?bool $include_archived = null;

    public ?string $sort_direction = null;

    public ?DateTimeInterface $last_edit_time_gt = null;

    public function jsonSerialize(): mixed
    {
        $dataToSerialize = parent::jsonSerialize();

        if (isset($dataToSerialize['last_edit_time_gt'])) {
            $dataToSerialize['last_edit.time[gt]'] = $dataToSerialize['last_edit_time_gt'];
            unset($dataToSerialize['last_edit_time_gt']);
        }

        return $dataToSerialize;
    }
}
