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
namespace Front\Driver\Response;


class Response
{

    public function header($meta,$value)
    {
        header("{$meta}:{$value}");
    }

    public function cookie($name=null,$value=null,$expire=0,$path='/',$domain=null,$secure=false)
    {
        setcookie($name,$value,$expire,$path,$domain,$secure);
    }

    public function status($code = 200)
    {
        header(\Front\Misc\Http::get($code));
    }

    public function end($html = '')
    {
        echo $html;exit();
    }

}