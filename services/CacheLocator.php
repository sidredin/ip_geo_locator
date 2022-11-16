<?php

namespace Services;

use Services\Cache\CacheInterface;

class CacheLocator implements Locator
{
    private Locator $next;
    private CacheInterface $cache;
    private string $cachePrefix;
    private int $ttl;

    public function __construct(Locator $next, CacheInterface $cache, string $cachePrefix, int $ttl)
    {
        $this->next = $next;
        $this->cache = $cache;
        $this->cachePrefix = $cachePrefix;
        $this->ttl = $ttl;
    }

    public function locate(Ip $ip): ?Location
    {
        $key = $this->cachePrefix . '_location_' . $ip->getValue();
        $location = $this->cache->get($key);

        if ($location === null) {
            $location = $this->next->locate($ip);
            $this->cache->set($key, $location, $this->ttl);
        }

        return $location;
    }
}