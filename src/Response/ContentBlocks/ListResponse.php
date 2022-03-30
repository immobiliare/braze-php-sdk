<?php

namespace ImmobiliareLabs\BrazeSDK\Response\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Object\ContentBlocks\ListItem;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    public ?int $count = null;

    /** @var ?ListItem[] */
    public ?array $content_blocks = null;

    public function fillFromArray(array $params, bool $allowExtraProperties = false): void
    {
        parent::fillFromArray($params);

        $this->content_blocks = [];

        if (isset($params['content_blocks']) && is_array($params['content_blocks'])) {
            foreach ($params['content_blocks'] as $contentBlockParams) {
                $contentBlock = ListItem::fromArray($contentBlockParams);
                $this->content_blocks[] = $contentBlock;
            }
        }
    }
}
