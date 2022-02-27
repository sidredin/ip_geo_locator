<?php

namespace Services;

class IpInfoLocator implements Locator
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
        if ($ip->getValue() == '127.0.0.1') {
            return null;
        }

        $url = "https://ipinfo.io/{$ip->getValue()}?token={$this->apiKey}";

        $response = $this->client->get($url);
        $data = json_decode($response, true);
        $data = array_map(function ($value) {
            return $value !== '-' ? $value : null;
        }, $data);

        if (empty($data['country'])) {
            return null;
        }

        return new Location($data['country'], $data['region'], $data['city']);
    }

}