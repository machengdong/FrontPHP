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
define('APPLY',ROOT_PATH.'/../app');
define('VIEW_PATH',APPLY.'/view/');
define('DOCUMENT_ROOT','/static/');

define('SERVER_ADDR','front.ximahe.cn');
define('SERVER_PORT','8080');
define('SWOOLE_SERVER',true);
define('ENABLE_STATIC_HANDLER',false);/*设置可以处理静态文件*/

$config = [];
$config['enable_static_handler'] = ENABLE_STATIC_HANDLER;
$config['document_root'] = ROOT_PATH;
$config['daemonize'] = true;
$config['worker_num'] = 2;
$config['log_file'] = './swoole.log';

include $dir.'/swoole/server.php';
include $dir.'/swoole/core.php';

include ROOT_PATH.'/../front/src/Loader.php';
include ROOT_PATH.'/../front/helper.php';

Front\Loader::autoload();

$server = new Server();
$server->init($config)->run();


