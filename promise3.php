<?php
$t1 = time();

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;

include './vendor/autoload.php';

$client = new Client([
//    'base_uri' => 'http://dd.com:80'
]);


$requests = function ($total) {
    for ($i = 0; $i < $total; $i++) {
        yield new Request('get', 'http://dd.com/api/a');
    }
};

$arr  = [];
$pool = new Pool($client, $requests(30), [
    'concurrency' => 5,
    'fulfilled'   => function (\GuzzleHttp\Psr7\Response $response, $index) use (&$arr) {
        $arr[] = json_decode($response->getBody()->getContents(), true);
    },
    'rejected'    => function ($reason, $index) {
        var_dump($reason->getMessage());
    },
]);


$promise = $pool->promise();


$promise->wait();

var_dump(time() - $t1);



