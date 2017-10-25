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
namespace Front\Mvc;

final class View
{

    private static $end_mark = '?>';

    private static $disable_functions = [];

    public function __construct()
    {

    }

    public function display($file,$data=[])
    {
        try {
            !empty($data) && extract($data);
            if(file_exists(VIEW_PATH.$file))
            {
                $file_content = file_get_contents(VIEW_PATH.$file);
                if($this->__checkFile($file_content))
                {
                    ob_start();
                    eval(self::$end_mark.$file_content);
                    $result = ob_get_clean();
                    //var_dump($result);
                    return $result;
                }
            }
        }catch (\Exception $e)
        {

        }
        /*if(file_exists(VIEW_PATH.$file))
            include VIEW_PATH.$file;
        else
            exit("VIEW: {$file} Not Found");*/
    }

    private function __checkFile($file_content)
    {
        return true;
    }
}