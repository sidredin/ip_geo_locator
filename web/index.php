<?php
require '../vendor/autoload.php';

$client = new \Services\HttpClient();
$handler = new \Services\ErrorHandler(new \Services\Logger());

$ipGeo = new \Services\IpGeoLocationLocator($client, '5577bc01761641499ca8cf32762a4cc1');
$ipInfo = new \Services\IpInfoLocator($client, 'aec867e3dbdf42');
$fakeLocator1 = new \Services\FakeLocator1();
$fakeLocator1b = new \Services\FakeLocator1b();
$fakeLocator2 = new \Services\FakeLocator2();
$fakeLocator2b = new \Services\FakeLocator2b();
$fakeLocator3 = new \Services\FakeLocator3();
$fakeLocator3b = new \Services\FakeLocator3b();

$cache = new \Services\Cache();

// В прежнем виде кешировал тот результат,
// который вернулся тем сервисом, который в первый раз был доступен. Т.е. мы, например, хотим, чтобы
// первый по списку сервис был приоритетным, но в момент кеширования он может быть недоступен. Поэтому
// мы обернули всё ChainLocator'ом вместо CacheLocator'а
$locator = new \Services\ChainLocator(
    new \Services\CacheLocator(
        new \Services\MuteLocator($ipInfo, $handler),
        $cache,
        3600
    ),
    new \Services\CacheLocator(
        new \Services\MuteLocator($ipGeo, $handler),
        $cache,
        3600
    ),
);

$location = $locator->locate(new \Services\Ip('176.97.160.1'));

echo "<pre>";
var_dump($location);