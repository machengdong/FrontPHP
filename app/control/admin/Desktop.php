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

use Front\Config;


class Desktop extends Base
{
    public function index()
    {
        $this->display('admin/base/desktop.php');
    }

    public function getTop()
    {
        $pagedata = [];
        $pagedata['username'] = $this->userInfo['admin_user_username'];
        $pagedata['logouturl'] = "/admin/logout.html";
        $this->display('admin/base/_top.php',$pagedata);
    }
    public function getLeft()
    {
        $menus = Config::get('menu.admin');
        $data = [
            'menu' => $menus,
        ];
        $this->display('admin/base/_left.php',$data);
    }
}