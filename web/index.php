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

// todo: Отрефакторить - в данном виде кеширует тот результат,
// который вернулся тем сервисом, который в первый раз был доступен. Т.е. мы, например, хотим, чтобы
// первый по списку сервис был приоритетным, но в момент кеширования он может быть недоступен
$locator = new \Services\CacheLocator(
    new \Services\ChainLocator(
        new \Services\MuteLocator($ipInfo, $handler),
        new \Services\MuteLocator($ipGeo, $handler),
        $fakeLocator1, $fakeLocator1b, $fakeLocator2, $fakeLocator2b
    ),
    $cache,
    3600
);

$location = $locator->locate(new \Services\Ip('176.97.160.1'));

echo "<pre>";
var_dump($location);