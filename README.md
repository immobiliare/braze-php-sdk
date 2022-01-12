Braze PHP SDK
============

![CI](https://github.com/immobiliare/wsse-header-generator-php/workflows/CI/badge.svg)

> This library provides a PHP interface to interact with Braze API.

## Table of Contents

- [Install](#install)
- [Usage](#usage)
- [Compatibility](#compatibility)
- [Requirements](#requirements)
- [Contributing](#contributing)
- [Changelog](#changelog)

## Install
Add the SDK as a dependency running:

```bash
composer require immobiliarelabs/braze-sdk
```

If not already included in your project, to make http requests, you need to install any combination of packages that implements:
- [`psr/http-client-implementation`](https://packagist.org/providers/psr/http-client-implementation) or [`symfony/http-client-contracts`](https://packagist.org/providers/symfony/http-client-contracts)
- [`psr/http-factory-implementation`](https://packagist.org/providers/psr/http-factory-implementation)
- [`psr/http-message-implementation`](https://packagist.org/providers/psr/http-message-implementation)

for example by installing ```symfony/http-client``` and ```nyholm/psr7``` you are ready to use the SDK, also with parallel requests.

Alternatively, it is also possible to use any http client by creating the appropriate adapter.


## Usage

Before instantiating the SDK it is necessary to create the http client and its adapter.

```php
use Immobiliare\BrazeSDK\ClientAdapter\SymfonyAdapter;
use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
$adapter = new SymfonyAdapter($client);
```

This example is for the Symfony http client, but the flow is the same whether you are using a PSR-18 client or a custom one.
Then you can create the SDK instance.

```php
$braze = new Braze($adapter, 'my-api-key', Instance::EU01);
```

Now you can start making requests by creating one and passing it to the appropriate endpoint. 

```php
use Immobiliare\BrazeSDK\Object\Event;
use Immobiliare\BrazeSDK\Request\Users\TrackRequest;

$event = new Event();
$event->external_id = 'user-id';
$event->app_id = 'app-id';
$event->name = 'event-name';
$event->time = new \DateTimeImmutable();
$event->properties = ['property' => 'property-value'];

$request = new TrackRequest();
$request->events = [$event];

$response = $braze->users()->track($request, false);
```

### Endpoints
Endpoints are organized by url prefix. The SDK supports all the Braze endpoints:
- users
- campaigns
- canvas
- messages
- content_blocks
- templates
- email
- events
- feed
- purchases
- sessions
- sends
- transactional
- subscription

### Validation and dry-run
The SDK does a formal validation of the request before executing it.
It is however possible to disable it completely:

```php
$braze->setValidation(false);
```

or just the strict one, since Braze partially executes requests when possible:

```php
$braze->setValidation(true, false);
```

By default, the SDK performs strict validation.

If you want to validate your requests without sending them to Braze you can enable dry-run mode:

```php
$braze->setDryRun(true);
```

### HTTP client adapter

If, in your project, you already have a http client which does not implement one of the two supported interfaces (Symfony and PSR18), 
and you don't want to install another one, just define an adapter that implements the ```Immobiliare\BrazeSDK\ClientAdapter\ClientAdapterInterface``` interface, 
and use it when instantiate the SDK.

### Parallel requests

If the chosen http client supports asynchronous calls, you can exploit that to make parallel requests to Braze in this way:

```php
$response1 = $braze->users()->track($request1, true);
$response2 = $braze->users()->track($request2, true);

$braze->flush();
```

The response objects will be filled with the values obtained only after the call to flush.

## Compatibility

| Version | Status        | PHP compatibility     | 
|---      |---            |---                    |
| 1.x     | maintained    | `>=7.2`               |


## Requirements

* ext-json

## Contributing

See [contributing](./CONTRIBUTING.md) file.


## Changelog

Please refer to the [changelog notes](CHANGELOG.md).