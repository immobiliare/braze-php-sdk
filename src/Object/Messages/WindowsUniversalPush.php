<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class WindowsUniversalPush extends BaseRequest
{
    /** @var ?string */
    public $push_type;

    /** @var ?string */
    public $toast_text1;

    /** @var ?string */
    public $toast_text2;

    /** @var ?string */
    public $toast_text3;

    /** @var ?string */
    public $toast_text_img_name;

    /** @var ?string */
    public $message_variation_id;

    /** @var ?string */
    public $extra_launch_string;

    public function validate(bool $strict): void
    {
        if (null === $this->push_type) {
            throw new ValidationException('The "push_type" field is required');
        }

        if (null === $this->toast_text1) {
            throw new ValidationException('The "toast_text1" field is required');
        }
    }
}
