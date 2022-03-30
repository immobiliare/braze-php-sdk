<?php

namespace ImmobiliareLabs\BrazeSDK\Response\EmailTemplates;

use ImmobiliareLabs\BrazeSDK\Object\EmailTemplates\ListItem;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    public ?int $count = null;

    /** @var ?ListItem[] */
    public ?array $templates = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->templates = [];

        if (isset($params['templates']) && is_array($params['templates'])) {
            foreach ($params['templates'] as $templateParams) {
                $this->templates[] = ListItem::fromArray($templateParams);
            }
        }
    }
}
