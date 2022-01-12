<?php

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use ImmobiliareLabs\BrazeSDK\Region;
use ImmobiliareLabs\BrazeSDK\Request\ContentBlocks\InfoRequest;
use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__ . '/../vendor/autoload.php';

$client = HttpClient::create();
$adapter = new SymfonyAdapter($client);

$braze = new Braze($adapter, 'your-api-key', Region::EU01);

$request = new InfoRequest();
$request->content_block_id = 'content_block_id';
$request->include_inclusion_data = true;

$response = $braze->contentBlocks()->info($request);

print_r($response);
