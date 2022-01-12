<?php

namespace ImmobiliareLabs\BrazeSDK\Response\ContentBlocks;

use ImmobiliareLabs\BrazeSDK\Object\ContentBlocks\ListItem;
use ImmobiliareLabs\BrazeSDK\Response\BaseResponse;

class ListResponse extends BaseResponse
{
    /** @var ?int */
    public $count;

    /** @var ?ListItem[] */
    public $content_blocks;

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
