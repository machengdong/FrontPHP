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
        $this->display('site/home.php');
    }

    public function getInfo()
    {
        $this->display('site/info.php');
    }
    public function getDesc()
    {
        $this->display('site/desc.php');
    }

    public function getMdebug()
    {

        $object = App::model(\app\model\Home::class);
        echo "<pre>";
        $result = $object->table('demo')->getList('*',['id'=>[1,2,3]]);;

        var_dump($result);
        echo "<hr>";
    }


}