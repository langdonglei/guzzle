<?php

include './vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_uri' => 'http://vip.luobokuai.com',
]);

$promises = [
    'a'=>$client->getAsync('/a'),
    'b'=>$client->getAsync('/b'),
];

try {
    $a = \GuzzleHttp\Promise\Utils::unwrap($promises);
} catch (Throwable $e) {
    echo $e->getMessage();
    exit;
}

var_dump($a);