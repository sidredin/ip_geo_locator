<?php

use PHPUnit\Framework\TestCase;
use Services\HttpClient;
use Services\Ip;
use Services\IpGeoLocationLocator;

class LocatorTest extends TestCase
{
    public function testSuccess(): void
    {
        $client = $this->createMock(HttpClient::class);

        $client->method('get')->willReturn(json_encode([
            'country_name' => 'United States',
            'state_prov' => 'Louisiana',
            'city' => 'Monroe',
        ]));

        $locator = new IpGeoLocationLocator($client, 'apiKey');
        $location = $locator->locate(new Ip('8.8.8.8'));

        self::assertNotNull($location);
        self::assertEquals('United States', $location->getCountry());
        self::assertEquals('Louisiana', $location->getRegion());
        self::assertEquals('Monroe', $location->getCity());
    }

    public function testNotFound(): void
    {
        $client = $this->createMock(HttpClient::class);

        $client->method('get')->willReturn(json_encode([
            'country_name' => '-',
            'state_prov' => '-',
            'city' => '-',
        ]));

        $locator = new IpGeoLocationLocator($client, 'apiKey');
        $location = $locator->locate(new Ip('127.0.0.1'));

        self::assertNull($location);
    }

}