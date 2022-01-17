<?php

namespace ImmobiliareLabs\BrazeSDK\Request\Campaigns;

use DateTimeInterface;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class ListRequest extends BaseRequest
{
    /** @var ?int */
    public $page;

    /** @var ?bool */
    public $include_archived;

    /** @var ?string */
    public $sort_direction;

    /** @var ?DateTimeInterface */
    public $last_edit_time_gt;

    public function jsonSerialize()
    {
        $dataToSerialize = parent::jsonSerialize();

        if (isset($dataToSerialize['last_edit_time_gt'])) {
            $dataToSerialize['last_edit.time[gt]'] = $dataToSerialize['last_edit_time_gt'];
            unset($dataToSerialize['last_edit_time_gt']);
        }

        return $dataToSerialize;
    }
}
