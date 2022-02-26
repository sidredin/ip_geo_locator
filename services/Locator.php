<?php

namespace Services;

class Locator
{
    public function locate(Ip $ip): ?Location
    {
        if ($ip->getValue() == '127.0.0.1') {
            return null;
        }

        $url = 'https://api.ipgeolocation.io/ipgeo?' . http_build_query([
                'apiKey' => '5577bc01761641499ca8cf32762a4cc1',
                'ip' => $ip->getValue(),
            ]);

        $response = file_get_contents($url);
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