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

//error_reporting(0);

$dir = realpath(dirname(__FILE__));

define('ROOT_PATH',$dir.'/../public');
define('FRAME_PATH',$dir.'/../front');

include ROOT_PATH.'/../front/src/Loader.php';
include ROOT_PATH.'/../front/helper.php';

Front\Loader::autoload();

$db_object = new \Front\Dbman();

$db_object->update();

