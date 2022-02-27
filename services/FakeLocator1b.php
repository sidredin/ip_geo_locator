<?php

namespace Services;

class FakeLocator1b implements Locator
{
    public function locate(Ip $ip): ?Location
    {
        return new Location('RU 1b');
    }

}