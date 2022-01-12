<?php

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use ImmobiliareLabs\BrazeSDK\Object\Recipient;
use ImmobiliareLabs\BrazeSDK\Region;
use ImmobiliareLabs\BrazeSDK\Request\Campaigns\TriggerSendRequest;
use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__ . '/../vendor/autoload.php';

$client = HttpClient::create();
$adapter = new SymfonyAdapter($client);

$braze = new Braze($adapter, 'your-api-key', Region::EU01);

$recipient = new Recipient();
$recipient->external_user_id = 'user-id';
$recipient->trigger_properties = [
    'address' => 'Via Roma 14'
];

$recipient->attributes = [
  'first_name' => 'Antonio'
];

$requestObject = new TriggerSendRequest();
$requestObject->campaign_id = 'your-campaign-id';
$requestObject->broadcast = false;
$requestObject->recipients = [$recipient];

$response = $braze->campaigns()->triggerSend($requestObject);

print_r($response);
