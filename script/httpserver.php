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
define('ROOT_PATH',$dir.'/../public');
define('SERVER_ADDR','172.16.130.130');
define('SERVER_PORT','8080');
#define('SERVER_ADDR','front.dev');
#define('SERVER_PORT','80');
define('SWOOLE_SERVER',true);

define('APPLY',ROOT_PATH.'/../app');
define('VIEW_PATH',APPLY.'/view/');
define('DOCUMENT_ROOT',ROOT_PATH.'/static/');


include $dir.'/swoole/server.php';
include $dir.'/swoole/core.php';
include ROOT_PATH.'/../front/src/Loader.php';
include ROOT_PATH.'/../front/helper.php';

Front\Loader::autoload();

$server = new Server();
$server->init()->run();


