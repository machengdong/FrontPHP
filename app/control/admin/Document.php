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
namespace app\control\admin;

class Document extends Base
{
    public function publish()
    {
        $this->display('admin/doc/add.php');
    }

    public function docList()
    {

    }

    public function doPublish()
    {
        $container = \Front\App::input('container');
        $title     = \Front\App::input('title');

    }
}