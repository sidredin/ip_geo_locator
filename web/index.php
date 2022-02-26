<?php
require '../vendor/autoload.php';
//phpinfo();

// test ipgeolocation API
$url = 'https://api.ipgeolocation.io/ipgeo?' . http_build_query([
        'apiKey' => '5577bc01761641499ca8cf32762a4cc1',
        'ip' => '8.8.8.8',
    ]);

$response = file_get_contents($url);
$data = json_decode($response, true);

echo "<pre>";

var_dump($data);