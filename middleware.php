<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

function m1(): Closure
{
    return function ($next) {
        return function ($request, $options) use ($next) {
            echo 'm1' . PHP_EOL;
            return $next($request, $options);
        };
    };
}

function m2(): Closure
{
    return function ($next) {
        return function ($request, $options) use ($next) {
            echo 'm2' . PHP_EOL;
            return $next($request, $options);
        };
    };
}

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Client;

$stack = new HandlerStack();
$stack->setHandler(new CurlHandler());
$stack->push(Middleware::retry(function () {
    return true;
}));
$stack->push(m2());
$client = new Client(['handler' => $stack]);


$request = new Request('get', 'http://baidu.com');
$client->send($request);

