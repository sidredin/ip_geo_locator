<?php

namespace Services;

class Locator
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

        $url = 'https://api.ipgeolocation.io/ipgeo?' . http_build_query([
                'apiKey' => $this->apiKey,
                'ip' => $ip->getValue(),
            ]);

        $response = $this->client->get($url);
        $data = json_decode($response, true);
        $data = array_map(function ($value) {
            return $value !== '-' ? $value : null;
        }, $data);

        if (empty($data['country_name'])) {
            return null;
        }

        return new Location($data['country_name'], $data['state_prov'], $data['city']);
    }

}