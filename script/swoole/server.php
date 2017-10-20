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


class Server
{
    public function __construct()
    {
        $this->server_addr = defined('SERVER_ADDR') ? SERVER_ADDR : '127.0.0.1';
        $this->server_port = defined('SERVER_PORT') ? SERVER_PORT : '80';
        $this->http = new swoole_http_server($this->server_addr, $this->server_port);
        $this->job  = new core();
    }

    public function init($config)
    {
        $this->http->on("start", function ($server) {
            echo "Swoole http server is started at http://{$this->server_addr}:{$this->server_port}\n";
        });

        $this->http->set($config);
        return $this;
    }

    public function run()
    {
        $this->http->on('request', function ($request, $response) {

            $request = (array)$request;
            $this->setPost($request);
            $this->setGet($request);
            $this->setServer($request);
            $this->setCookie($request);
            $this->setFile($request);
            $this->job->boot($response);

        });

        $this->http->start();
    }

    public function setPost(array $request)
    {
        $_POST = $request['post'];
    }

    public function setGet(array $request)
    {
        $_GET = $request['get'];
    }

    public function setCookie(array $request)
    {
        $_COOKIE = $request['cookie'];
    }

    public function setFile(array $request)
    {
        $_FILES = $request['files'];
    }

    public function setServer(array $request)
    {
        foreach ($request['server'] as $k=>$v)
        {
            $_SERVER[strtoupper($k)] = $v;
        }
    }
}