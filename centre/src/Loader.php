<?php

namespace Front;

class Loader
{
    static public function autoload()
    {
        spl_autoload_register(
            function($class_name) {
                if(strpos($class_name,'Front\\') !== false)
                {
                    $class_name = str_replace('Front\\','src/',$class_name);
                    include FRAME_PATH.'/'.str_replace('\\','/',$class_name).'.php';
                    return true;
                }
                try {
                    include ROOT_PATH.'/../'.str_replace('\\','/',$class_name).'.php';
                }
                catch (\Exception $e)
                {
                    var_dump($e->getMessage());die;
                }
            }
        );
    }
}