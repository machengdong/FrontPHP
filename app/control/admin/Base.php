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
namespace app\control\admin;

use Front\Mvc\Control;
use Front\App;


class Base extends Control
{
    public function root()
    {
        $this->display('home.php');
    }

    public function getInfo()
    {
        $this->display('info.php');
    }
    public function getDesc()
    {
        $this->display('desc.php');
    }
}