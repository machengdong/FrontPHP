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

error_reporting(0);

$dir = realpath(dirname(__FILE__));

define('FRAME_PATH',$dir.'/../front');
define('ROOT_PATH',$dir);

include ROOT_PATH.'/swoole/server.php';

include ROOT_PATH.'/../front/src/Loader.php';

include ROOT_PATH.'/../front/helper.php';

Front\Loader::autoload();

$server = new Server();

$server->init()->run();