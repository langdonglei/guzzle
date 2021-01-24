<?php


use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Psr\Http\Message\ResponseInterface;

require_once './vendor/autoload.php';


$client = new Client();
$jar    = new CookieJar();

//$client->requestAsync('post', 'http://vip.luobokuai.com/Center/Login', [
//    'json'    => [
//        'action'    => 'login',
//        'telephone' => '15838171323',
//        'password'  => '321321',
//    ],
//    'cookies' => $jar,
//])->then(
//    function (ResponseInterface $response) use ($client, $jar, &$data) {
//        $str = $response->getBody()->getContents();
//        $arr = json_decode($str, true);
//        if ($arr && 0 == $arr['code']) {
//            $a    = $client->request('post', 'http://vip.luobokuai.com/Center/getNoviceTask', [
//                'cookies'     => $jar,
//                'http_errors' => false,
//            ]);
//            $str2 = $a->getBody()->getContents();
//            $arr2 = json_decode($str2, true);
//            if ($arr2 && 0 == $arr2['code']) {
//                $data = $arr2['data'];
//            }
//        }
//    },
//    function (\GuzzleHttp\Exception\RequestException $exception) use (&$data) {
//        $data = $exception->getMessage();
//    }
//)->wait();
//var_dump($data);







