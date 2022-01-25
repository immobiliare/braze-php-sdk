Braze PHP SDK
============

![CI](https://github.com/immobiliare/braze-php-sdk/workflows/CI/badge.svg)
[![codecov](https://codecov.io/gh/immobiliare/braze-php-sdk/branch/main/graph/badge.svg?token=8H5dESJuiq)](https://codecov.io/gh/immobiliare/braze-php-sdk)
[![Latest Stable Version](http://poser.pugx.org/immobiliarelabs/braze-sdk/v)](https://packagist.org/packages/immobiliarelabs/braze-sdk) 
[![Total Downloads](http://poser.pugx.org/immobiliarelabs/braze-sdk/downloads)](https://packagist.org/packages/immobiliarelabs/braze-sdk) 
[![Latest Unstable Version](http://poser.pugx.org/immobiliarelabs/braze-sdk/v/unstable)](https://packagist.org/packages/immobiliarelabs/braze-sdk) 
[![License](http://poser.pugx.org/immobiliarelabs/braze-sdk/license)](https://packagist.org/packages/immobiliarelabs/braze-sdk) 
[![PHP Version Require](http://poser.pugx.org/immobiliarelabs/braze-sdk/require/php)](https://packagist.org/packages/immobiliarelabs/braze-sdk)

> A PHP client to interact with Braze API

[Braze](https://www.braze.com/) offers a cloud-based customer engagement platform for multichannel marketing. This SDK allows you to integrate its REST API into a PHP application.

## Table of Contents

- [Features](#features)
- [Install](#install)
- [Usage](#usage)
  - [Example](#example)
  - [Endpoints](#endpoints)
  - [Validation and dry-run](#validation-and-dry-run)
  - [HTTP client adapter](#http-client-adapter)
  - [Parallel requests](#parallel-requests)
- [Compatibility](#compatibility)
- [Requirements](#requirements)
- [Powered Apps](#powered-apps)
- [Contributing](#contributing)
- [Changelog](#changelog)
- [License](#license)

## Features

- Explicit representation of the API contract to write requests easily using the IDE autocomplete
- Formal validation (strict and non-strict) of requests
- Dry-run mode to simulate requests and validate them without actually performing calls
- Ability to use any http client via an adapter. For PSR-18 compatible clients and the Symfony client, adapters are included in the SDK
- Parallel API calls supported if the http client allows it (for example the Symfony one)

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

### Example

Before instantiating the SDK it is necessary to create the http client and its adapter.

```php
use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
$adapter = new SymfonyAdapter($client);
```

This example is for the Symfony http client, but the flow is the same whether you are using a PSR-18 client or a custom one.
Then you can create the SDK instance.

```php
use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\Region;

$braze = new Braze($adapter, 'my-api-key', Region::EU01);
```

Now you can start making requests by creating one and passing it to the appropriate endpoint. 

```php
use ImmobiliareLabs\BrazeSDK\Object\Event;
use ImmobiliareLabs\BrazeSDK\Request\Users\TrackRequest;

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

You can see a few complete [examples](./examples) in the repository.

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
and you don't want to install another one, just define an adapter that implements the ```ImmobiliareLabs\BrazeSDK\ClientAdapter\ClientAdapterInterface``` interface, 
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

## Powered Apps

Braze PHP SDK was created by the PHP team at [ImmobiliareLabs](https://labs.immobiliare.it/), the Tech dept of [Immobiliare.it](https://www.immobiliare.it), the #1 real estate company in Italy.

We are currently using this SDK to stay in touch with our users.

**If you are using Braze PHP SDK in production [drop us a message](mailto:opensource@immobiliare.it)**.

## Contributing

Any questions, bug reports or suggestions for improvement are very welcome. See the [contributing](./CONTRIBUTING.md) file for details on how to contribute.


## Changelog

Please refer to the [changelog notes](CHANGELOG.md).

## License

Braze PHP SDK is licensed under the MIT license.  
See the [LICENSE](./LICENSE) file for more information.