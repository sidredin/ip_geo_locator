<?php

namespace Services;

class IpInfoLocator
{
    private HttpClient $client;
    private string $apiKey;

    public function __construct(HttpClient $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function locate(Ip $ip): ?Location
    {
        
    }

}