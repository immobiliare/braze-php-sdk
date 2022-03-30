<?php

namespace ImmobiliareLabs\BrazeSDK\Test;

use ImmobiliareLabs\BrazeSDK\Braze;
use ImmobiliareLabs\BrazeSDK\ClientAdapter\SymfonyAdapter;
use ImmobiliareLabs\BrazeSDK\Request\Feed\ListRequest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

class BrazeTest extends TestCase
{
    private ?Braze $instance;

    public function setUp(): void
    {
        parent::setUp();

        $adapter = new SymfonyAdapter(HttpClient::create());
        $this->instance = new Braze($adapter, 'API-KEY');
    }

    public function testDryRun(): void
    {
        $dryRun = true;
        $this->instance->setDryRun($dryRun);

        $this->assertSame($dryRun, $this->instance->getDryRun());
    }

    public function testValidation(): void
    {
        $validation = true;
        $strictValidation = false;

        $this->instance->setValidation($validation, $strictValidation);

        $this->assertSame($validation, $this->instance->getValidation());
        $this->assertSame($strictValidation, $this->instance->getStrictValidation());
    }

    public function testFlush(): void
    {
        $this->instance->setDryRun(true);

        $this->instance->feed()->list(new ListRequest(), false);

        $resolvedResponseCount = $this->instance->flush();
        $this->assertSame(1, $resolvedResponseCount);
    }
}
