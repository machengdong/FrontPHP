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

//error_reporting(E_ALL & ~E_NOTICE);

define('FRAME_PATH',ROOT_PATH.'/../front');

define('APPLY',ROOT_PATH.'/../app');

define('VIEW_PATH',APPLY.'/view/');

define('DOCUMENT_ROOT','/static/');

define('DATA_PATH',ROOT_PATH.'/../data');

define('SESSION_NAME','__t__');

//---- swoole http server ----\\
define('SERVER_ADDR','172.16.130.130');

define('SERVER_PORT','8080');

define('SWOOLE_SERVER',false);

define('ENABLE_STATIC_HANDLER',false);
