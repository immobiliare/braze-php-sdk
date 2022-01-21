<?php

namespace ImmobiliareLabs\BrazeSDK;

use ImmobiliareLabs\BrazeSDK\ClientAdapter\ClientAdapterInterface;
use ImmobiliareLabs\BrazeSDK\Endpoint\Campaigns;
use ImmobiliareLabs\BrazeSDK\Endpoint\Canvas;
use ImmobiliareLabs\BrazeSDK\Endpoint\ContentBlocks;
use ImmobiliareLabs\BrazeSDK\Endpoint\Email;
use ImmobiliareLabs\BrazeSDK\Endpoint\EmailTemplates;
use ImmobiliareLabs\BrazeSDK\Endpoint\Endpoint;
use ImmobiliareLabs\BrazeSDK\Endpoint\Events;
use ImmobiliareLabs\BrazeSDK\Endpoint\Feed;
use ImmobiliareLabs\BrazeSDK\Endpoint\Messages;
use ImmobiliareLabs\BrazeSDK\Endpoint\Purchases;
use ImmobiliareLabs\BrazeSDK\Endpoint\Segments;
use ImmobiliareLabs\BrazeSDK\Endpoint\Sends;
use ImmobiliareLabs\BrazeSDK\Endpoint\Sessions;
use ImmobiliareLabs\BrazeSDK\Endpoint\Subscription;
use ImmobiliareLabs\BrazeSDK\Endpoint\Transactional;
use ImmobiliareLabs\BrazeSDK\Endpoint\Users;

class Braze
{
    /** @var Client */
    private $client;

    /** @var Endpoint[] */
    private $endpoints = [];

    /** @var bool */
    private $dryRun = false;

    /** @var bool */
    private $validation = true;

    /** @var bool */
    private $strictValidation = true;

    public function __construct(ClientAdapterInterface $clientAdapter, string $apiKey, ?string $restEndpoint = null)
    {
        $this->client = new Client($clientAdapter, $apiKey, new Region($restEndpoint ?? Region::US01));
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function flush(): int
    {
        return $this->client->flush();
    }

    public function users(): Users
    {
        return $this->endpoint('users', Users::class);
    }

    public function campaigns(): Campaigns
    {
        return $this->endpoint('campaigns', Campaigns::class);
    }

    public function canvas(): Canvas
    {
        return $this->endpoint('canvas', Canvas::class);
    }

    public function messages(): Messages
    {
        return $this->endpoint('messages', Messages::class);
    }

    public function contentBlocks(): ContentBlocks
    {
        return $this->endpoint('contentBlocks', ContentBlocks::class);
    }

    public function emailTemplates(): EmailTemplates
    {
        return $this->endpoint('emailTemplates', EmailTemplates::class);
    }

    public function email(): Email
    {
        return $this->endpoint('email', Email::class);
    }

    public function events(): Events
    {
        return $this->endpoint('events', Events::class);
    }

    public function purchases(): Purchases
    {
        return $this->endpoint('purchases', Purchases::class);
    }

    public function segments(): Segments
    {
        return $this->endpoint('segments', Segments::class);
    }

    public function sessions(): Sessions
    {
        return $this->endpoint('sessions', Sessions::class);
    }

    public function sends(): Sends
    {
        return $this->endpoint('sends', Sends::class);
    }

    public function transactional(): Transactional
    {
        return $this->endpoint('transactional', Transactional::class);
    }

    public function feed(): Feed
    {
        return $this->endpoint('feed', Feed::class);
    }

    public function subscription(): Subscription
    {
        return $this->endpoint('subscription', Subscription::class);
    }

    private function endpoint(string $key, string $class)
    {
        if (!isset($this->endpoints[$key])) {
            $this->endpoints[$key] = new $class($this);
        }

        return $this->endpoints[$key];
    }

    public function setDryRun(bool $active): void
    {
        $this->dryRun = $active;
    }

    public function setValidation(bool $active, bool $strict = false): void
    {
        $this->validation = $active;
        $this->strictValidation = $active && $strict;
    }

    public function getDryRun(): bool
    {
        return $this->dryRun;
    }

    public function getValidation(): bool
    {
        return $this->validation;
    }

    public function getStrictValidation(): bool
    {
        return $this->strictValidation;
    }
}
