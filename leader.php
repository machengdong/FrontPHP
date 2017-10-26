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
$dir = realpath(dirname(__FILE__));
define('ROOT_PATH',$dir.'/public');

include ROOT_PATH.'/../front/src/Loader.php';
include ROOT_PATH.'/../front/helper.php';
include ROOT_PATH.'/../config/config.php';

Front\Loader::autoload();

$config = [];
Front\Shell::init($config)->run();

