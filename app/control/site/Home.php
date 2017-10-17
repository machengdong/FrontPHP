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
namespace app\control\site;

use Front\Mvc\Control;
use Front\App;


class Home extends Control
{
    public function root()
    {
        echo "<pre>";
        dump('this site Control.root',false);
    }

    public function getInfo()
    {
        echo 'xxxxx';
        $this->display('home.php');
    }
}