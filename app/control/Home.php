<?php


namespace app\control;

use Front\App;


class Home
{
    public function root()
    {
       $model_object = App::model(\app\model\Home::class);
       $model_object->storage()->select();
    }

    public function getInfo()
    {
        print_r('Home.control.getInfo');
    }
}