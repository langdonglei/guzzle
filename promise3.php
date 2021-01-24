<?php

use GuzzleHttp\Psr7\Request;

include './vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_uri' => 'http://www.baidu.com'
]);


//$requests = function ($total) {
//    $uri = 'http://127.0.0.1:8126/guzzle-server/perf';
//    for ($i = 0; $i < $total; $i++) {
//        yield new Request('GET', $uri);
//    }
//};
$r1 = new Request('get', 'http://www.baidu.com');
$r2 = new Request('get', 'http://www.baidu1ddd12.1com');
$r3 = new Request('get', 'http://www.baidu.com');

(new \GuzzleHttp\Pool($client, [
    $r1, $r2, $r3
],[
    'concurrency' => 5,
    'fulfilled' => function ($response, $index) {
        echo $index;
    },
    'rejected' => function ($reason, $index) {

    },
]))->promise()->wait();

