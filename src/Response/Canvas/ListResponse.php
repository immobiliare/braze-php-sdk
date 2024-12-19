<?php

namespace ImmobiliareLabs\BrazeSDK\Response\Canvas;

use ImmobiliareLabs\BrazeSDK\Object\Canvas\ListItem;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?ListItem[] */
    public ?array $canvases = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->canvases = [];

        if (isset($params['canvases']) && is_array($params['canvases'])) {
            foreach ($params['canvases'] as $canvasParams) {
                $this->canvases[] = ListItem::fromArray($canvasParams);
            }
        }
    }
}
