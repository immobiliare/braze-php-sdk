<?php

namespace ImmobiliareLabs\BrazeSDK\Object;

use ImmobiliareLabs\BrazeSDK\Object\Messages\AndroidPush;
use ImmobiliareLabs\BrazeSDK\Object\Messages\ApplePush;
use ImmobiliareLabs\BrazeSDK\Object\Messages\ContentCard;
use ImmobiliareLabs\BrazeSDK\Object\Messages\Email;
use ImmobiliareLabs\BrazeSDK\Object\Messages\KindlePush;
use ImmobiliareLabs\BrazeSDK\Object\Messages\SMS;
use ImmobiliareLabs\BrazeSDK\Object\Messages\Webhook;
use ImmobiliareLabs\BrazeSDK\Object\Messages\WebPush;
use ImmobiliareLabs\BrazeSDK\Object\Messages\WindowsPhone8Push;
use ImmobiliareLabs\BrazeSDK\Object\Messages\WindowsUniversalPush;

class Messages extends BaseObject
{
    /** @var ?ApplePush */
    public $apple_push;

    /** @var ?AndroidPush */
    public $android_push;

    /** @var ?WindowsPhone8Push */
    public $windows_phone8_push;

    /** @var ?WindowsUniversalPush */
    public $windows_universal_push;

    /** @var ?KindlePush */
    public $kindle_push;

    /** @var ?WebPush */
    public $web_push;

    /** @var ?Email */
    public $email;

    /** @var ?Webhook */
    public $webhook;

    /** @var ?ContentCard */
    public $content_card;

    /** @var ?SMS */
    public $sms;
}
