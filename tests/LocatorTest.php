<?php

use PHPUnit\Framework\TestCase;
use Services\Locator;

class LocatorTest extends TestCase
{
    public function testSuccess(): void
    {
        $locator = new Locator();
        $location = $locator->locate('8.8.8.8');

        self::assertNotNull($location);
        self::assertEquals('United States', $location->getCountry());
        self::assertEquals('Louisiana', $location->getRegion());
        self::assertEquals('Monroe', $location->getCity());
    }

    public function testNotFound(): void
    {
        $locator = new Locator();
        $location = $locator->locate('0.0.0.1');

        self::assertNull($location);
    }

    public function testInvalid(): void
    {
        $locator = new Locator();
        $this->expectException(InvalidArgumentException::class);
        $location = $locator->locate('invalid');
    }

    public function testEmpty(): void
    {
        $locator = new Locator();
        $this->expectException(InvalidArgumentException::class);
        $location = $locator->locate('');
    }

}