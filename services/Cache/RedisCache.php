<?php

namespace Services\Cache;

use Redis;

class RedisCache implements CacheInterface
{
    private Redis $redis;

    public function __construct()
    {
        $redis = new Redis;
        $redis->connect('redis');
    }

    public function get(string $id)
    {
//        todo: use Redis
    }

    public function set(string $id, $data, $ttl): void
    {
//        todo: use Redis
    }
}