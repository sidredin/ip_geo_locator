<?php

namespace Services;

class FakeLocator3b implements Locator
{
    public function locate(Ip $ip): ?Location
    {
        return new Location('RU 3b', 'Dagestan', 'Kaspiysk');
    }

}