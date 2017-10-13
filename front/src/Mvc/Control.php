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

class Control
{

    public function __construct()
    {

    }

    public function display($file,$data=[])
    {
        View::display($file,$data);
    }
}