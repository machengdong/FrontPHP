<?php

error_reporting(E_ALL & ~E_NOTICE);

define('FRAME_PATH',realpath(dirname(__FILE__)));

include_once FRAME_PATH."/src/Loader.php";

Front\Loader::autoload();

Front\Kernel::boot();


