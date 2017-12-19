<?php

$cmd = isset($argv[1]) && $argv[1] ? $argv[1] : '';

!empty($cmd) && include_once "Server.php";

switch ($cmd) {
    case 'start':
        echo 'start server...'.PHP_EOL;
        $obj = new Server();
        $obj->start();
        break;
    case 'stop':
        echo 'stop server...'.PHP_EOL;
        $obj = new Server();
        $obj->stop();
        break;
    default:
        echo 'use {start|stop}'.PHP_EOL;
        break;
}