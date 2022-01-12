<?php

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use ImmobiliareLabs\BrazeSDK\Object\Event;
use ImmobiliareLabs\BrazeSDK\Object\UserAttributes;
use ImmobiliareLabs\BrazeSDK\Region;
use ImmobiliareLabs\BrazeSDK\Request\Users\TrackRequest;
use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__ . '/../vendor/autoload.php';

$client = HttpClient::create();
$adapter = new SymfonyAdapter($client);

$braze = new Braze($adapter, 'your-api-key', Region::EU01);

$userAttributes = new UserAttributes();
$userAttributes->external_id = 'user-id';
$userAttributes->my_custom_attribute = 1;
$userAttributes->email = 'user-email';
$userAttributes->braze_id = null;

$event = new Event();
$event->external_id = 'user-id';
$event->app_id = 'app-id';
$event->name = 'event-type';
$event->time = new \DateTimeImmutable();
$event->properties = ['property' => 'property-value'];

$request = new TrackRequest();
$request->attributes = [$userAttributes];
$request->events = [$event];

$response = $braze->users()->track($request);

print_r($response);
