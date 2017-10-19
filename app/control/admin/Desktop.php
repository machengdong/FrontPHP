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
use Front\Config;


class Desktop extends Control
{
    public function index()
    {
        $this->display('admin/base/desktop.php');
    }

    public function getTop()
    {
        $this->display('admin/base/_top.php');
    }
    public function getLeft()
    {
        $menus = Config::get('menu.admin');
        $data = [
            'menu' => $menus,
        ];
        $this->display('admin/base/_left.php',$data);
    }
}