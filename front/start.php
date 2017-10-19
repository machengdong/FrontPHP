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

error_reporting(E_ALL & ~E_NOTICE);

define('FRAME_PATH',realpath(dirname(__FILE__)));
define('APPLY',ROOT_PATH.'/../app');
define('VIEW_PATH',APPLY.'/view/');
define('DOCUMENT_ROOT','/static/');
//document_root


include_once FRAME_PATH."/src/Loader.php";

include_once FRAME_PATH."/helper.php";

Front\Loader::autoload();

Front\Kernel::boot();


