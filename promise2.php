<?php

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Psr7\Request;

include './vendor/autoload.php';

$client = new Client([
    'base_uri' => 'http://dd.com:80'
]);

$request1 = new Request('get', 'api/a');
$request2 = new Request('get', 'api/b');
$request3 = new Request('get', 'api/c');

try {
    $responses = Utils::unwrap([
        'a' => $client->sendAsync($request1),
        'b' => $client->sendAsync($request2),
        'c' => $client->sendAsync($request3),
    ]);
} catch (Throwable $e) {
    var_dump($e->getMessage());
    exit();
}

foreach ($responses as $response) {
    echo ($response->getBody());
}
