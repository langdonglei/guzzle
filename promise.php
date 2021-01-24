<?php

include './vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_uri' => 'http://vip.luobokuai.com',
]);



$promises = [
    'a' => $client->postAsync( 'http://vip.luobokuai.com/Center/Login', [
        'json'    => [
            'action'    => 'login',
            'telephone' => '',
            'password'  => '321321',
        ],
        'cookies' => $jar,
    ]),
    'b' => $client->postAsync( 'http://vip.luobokuai.com/Center/Login11', [
        'json'    => [
            'action'    => 'login',
            'telephone' => '',
            'password'  => '321321',
        ],
        'cookies' => $jar,
    ])
];


try {
    $a = \GuzzleHttp\Promise\Utils::unwrap($promises);
} catch (Throwable $e) {
    echo $e->getMessage();
}
