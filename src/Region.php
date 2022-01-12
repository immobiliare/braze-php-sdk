<?php

namespace ImmobiliareLabs\BrazeSDK;

use ImmobiliareLabs\BrazeSDK\Exception\NotAvailableRegionException;

class Region
{
    public const US01 = 'https://rest.iad-01.braze.com';
    public const US02 = 'https://rest.iad-02.braze.com';
    public const US03 = 'https://rest.iad-03.braze.com';
    public const US04 = 'https://rest.iad-04.braze.com';
    public const US05 = 'https://rest.iad-05.braze.com';
    public const US06 = 'https://rest.iad-06.braze.com';
    public const US07 = 'https://rest.iad-07.braze.com';
    public const US08 = 'https://rest.iad-08.braze.com';
    public const EU01 = 'https://rest.fra-01.braze.eu';
    public const EU02 = 'https://rest.fra-02.braze.eu';

    /** @var string */
    private $restEndpoint;

    public function __construct(string $restEndpoint, bool $force = false)
    {
        if (false === $force && !in_array($restEndpoint, $this->getAvailableRestEndpoints())) {
            throw new NotAvailableRegionException();
        }

        $this->restEndpoint = $restEndpoint;
    }

    public function getRestEndpoint(): string
    {
        return $this->restEndpoint;
    }

    private function getAvailableRestEndpoints(): array
    {
        return [
            self::US01,
            self::US02,
            self::US03,
            self::US04,
            self::US05,
            self::US06,
            self::US07,
            self::US08,
            self::EU01,
            self::EU02,
        ];
    }
}
