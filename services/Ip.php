<?php

namespace Services;

final class Ip
{
    private $value;

    public function __construct(string $ip)
    {
        if (empty($ip)) {
            throw new \InvalidArgumentException('Empty IP address');
        }
        if (false === filter_var($ip, FILTER_VALIDATE_IP)) {
            if (false === filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                throw new \InvalidArgumentException('Invalid IP address ' . $ip);
            }
        }
        $this->value = $ip;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}