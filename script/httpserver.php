<?php
/**
 * FrontPHP  [文件描述]
 *
 * @category PHP
 *
 * @version  Release: 1.0.0
 *
 * @author   lru <lru@ximahe.cn>
 *
 */
$http = new swoole_http_server("172.16.130.130", 8080);

$http->on("start", function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:8080\n";
});

$http->on("request", function ($request, $response) {
    $server = (array)$request;
    $_SERVER['PATH_INFO'] = $server['server']['path_info'] ? :  "/";
    $server_path = realpath(dirname(__FILE__));
    ob_start();
    require $server_path.'/../public/index.php';
    $result = ob_get_clean();
    var_dump($result);
    //$response->header("Content-Type", "text/plain");
    $response->end($result);
});

$http->start();