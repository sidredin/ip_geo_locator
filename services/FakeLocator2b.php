<?php

namespace Services;

class FakeLocator2b implements Locator
{
    public function locate(Ip $ip): ?Location
    {
        return new Location('RU 2b', 'Dagestan');
    }

}