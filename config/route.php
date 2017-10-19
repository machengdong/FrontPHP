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
return [
   'site'=> [
       '/'         => '\app\control\site\Home@root',
       '/get.html' => '\app\control\site\Home@getInfo',
       '/v.html' => '\app\control\site\Home@getDesc',
       '/swoole.jsp' => '\app\control\site\Swoole@index',
       ],
   'admin'=> [
       '/login.html' => '\app\control\admin\Passport@index',
       '/desktop.html'=>'\app\control\admin\Desktop@index',
       '/get/top.html'=>'\app\control\admin\Desktop@getTop',
       '/get/left.html'=>'\app\control\admin\Desktop@getLeft',
       ],
];