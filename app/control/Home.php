<?php


namespace app\control;

use Front\Mvc\Control;
use Front\App;


class Home extends Control
{
    public function root()
    {
        $model_object = App::model(\app\model\Home::class);
        $model_object->storage()->select();
        $data = App::input();
        $this->display('home.php',$data);
    }

    public function getInfo()
    {
        print_r('Home.control.getInfo');
    }
}