<?php

namespace Services;

class FakeLocator2 implements Locator
{
    public function locate(Ip $ip): ?Location
    {
        return new Location('RU 2', 'Dagestan');
    }

}