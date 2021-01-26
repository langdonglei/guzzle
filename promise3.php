<?php

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;

include './vendor/autoload.php';

$client = new Client([
//    'base_uri' => 'http://dd.com'
]);


$requests = function ($total) {
    for ($i = 0; $i < $total; $i++) {
        yield new Request('get', 'http://www.baidu.com');
    }
};


$responses = [];
$pool = new Pool($client, $requests(1), [
    'concurrency' => 2,
    'fulfilled'   => function ($response, $index) {
        $responses[$index] = $response;
    },
    'rejected'    => function ($reason, $index) {
        $responses[$index] = [];
    },
]);

$promise = $pool->promise();

// Force the pool of requests to complete.
$promise->wait();

var_dump($responses);



