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
namespace Front;

class Loader
{
    static public function autoload()
    {
        spl_autoload_register(
            function($class_name) {
                try {
                    if(strpos($class_name,'Front\\') === 0)
                    {
                        $class_name = str_replace('Front\\','src/',$class_name);
                        include FRAME_PATH.'/'.str_replace('\\','/',$class_name).'.php';
                        return true;
                    }

                    include ROOT_PATH.'/../'.str_replace('\\','/',$class_name).'.php';
                    return true;
                }
                catch (\Exception $e)
                {
                    var_dump($e->getMessage());die;
                }
            }
        );
    }
}