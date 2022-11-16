<?php

namespace Services\Cache;

interface CacheInterface
{
    public function get(string $id);

    public function set(string $id, $data, $ttl): void;
}