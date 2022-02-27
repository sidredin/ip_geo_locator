<?php

namespace Services;

class FakeLocator3 implements Locator
{
    public function locate(Ip $ip): ?Location
    {
        return new Location('RU 3', 'Dagestan', 'Kaspiysk');
    }

}