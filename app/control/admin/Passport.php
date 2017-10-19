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



class Passport extends Control
{
    public function index()
    {
        //exit('admin.index');
        $this->display('admin/login.php');
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