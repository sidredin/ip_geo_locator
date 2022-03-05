<?php

namespace Services;

class CacheLocator implements Locator
{
    private Locator $next;
    private Cache $cache;
    private int $ttl;

    public function __construct(Locator $next, Cache $cache, int $ttl)
    {
        $this->next = $next;
        $this->cache = $cache;
        $this->ttl = $ttl;
    }

    public function locate(Ip $ip): ?Location
    {
        $key = 'location-' . $ip->getValue();
        $location = $this->cache->get($key);

        if ($location === null) {
            $location = $this->next->locate($ip);
            $this->cache->set($key, $location, $this->ttl);
        }

        return $location;
    }
}