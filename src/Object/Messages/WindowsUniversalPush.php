<?php

namespace ImmobiliareLabs\BrazeSDK\Object\Messages;

use ImmobiliareLabs\BrazeSDK\Exception\ValidationException;
use ImmobiliareLabs\BrazeSDK\Request\BaseRequest;

class WindowsUniversalPush extends BaseRequest
{
    public ?string $push_type = null;

    public ?string $toast_text1 = null;

    public ?string $toast_text2 = null;

    public ?string $toast_text3 = null;

    public ?string $toast_text_img_name = null;

    public ?string $message_variation_id = null;

    public ?string $extra_launch_string = null;

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
