<?php

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use ImmobiliareLabs\BrazeSDK\Region;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\ListRequest;
use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__ . '/../vendor/autoload.php';

$client = HttpClient::create();
$adapter = new SymfonyAdapter($client);

$braze = new Braze($adapter, 'your-api-key', Region::EU01);

$request = new ListRequest();

$response = $braze->contentBlocks()->list($request);

print_r($response);
