<?php

namespace Services;

class FakeLocator1 implements Locator
{
    public function locate(Ip $ip): ?Location
    {
        return new Location('RU 1');
    }

}