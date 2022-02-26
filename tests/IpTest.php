<?php

use PHPUnit\Framework\TestCase;
use Services\Ip;

class IpTest extends TestCase
{
    public function testIp4(): void
    {
        $ip = new Ip($value = '8.8.8.8');
        self::assertEquals($value, $ip->getValue());
    }

    public function testIp6(): void
    {
        $ip = new Ip($value = '0000:0000:0000:0000:0000:ffff:0808:0808');
        self::assertEquals($value, $ip->getValue());
    }

    public function testInvalid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Ip('invalid');
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Ip('');
    }

}