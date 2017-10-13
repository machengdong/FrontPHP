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
namespace app\control;

use Front\Mvc\Control;
use Front\App;


class Home extends Control
{
    public function root()
    {
        echo "<pre>";
        $model_object = App::model(\app\model\Home::class);
        $model_object->storage('master')->select();
        $data = App::input();
        dump($model_object,false);
        $this->display('home.php',$data);
    }

    public function getInfo()
    {
        print_r('Home.control.getInfo');
    }
}