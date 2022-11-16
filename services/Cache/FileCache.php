<?php

namespace Services\Cache;

class FileCache implements CacheInterface
{
    public function get(string $id)
    {
//        todo: use file cache
    }

    public function set(string $id, $data, $ttl): void
    {
//        todo: use file cache
    }
}