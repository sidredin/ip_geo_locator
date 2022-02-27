<?php

namespace Services;

interface Locator
{
    public function locate(Ip $ip): ?Location;
}