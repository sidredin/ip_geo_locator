<?php

namespace Services\Cache;

class DbCache implements CacheInterface
{
    public function get(string $id)
    {
//        todo: use DB cache
    }

    public function set(string $id, $data, $ttl): void
    {
//        todo: use DB cache
    }
}