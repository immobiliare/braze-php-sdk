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
    public ?ApplePush $apple_push = null;

    public ?AndroidPush $android_push = null;

    public ?WindowsPhone8Push $windows_phone8_push = null;

    public ?WindowsUniversalPush $windows_universal_push = null;

    public ?KindlePush $kindle_push = null;

    public ?WebPush $web_push = null;

    public ?Email $email = null;

    public ?Webhook $webhook = null;

    public ?ContentCard $content_card = null;

    public ?SMS $sms = null;
}
