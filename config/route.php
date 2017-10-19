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
       '/swoole.jsp' => '\app\control\site\Swoole@index',
       ],
   /*'admin'=> [
       '/'         => '\App\control\site\Home@root',
       '/get.html' => '\App\control\site\Home@getInfo',
       '/swoole.jsp' => '\App\control\site\Swoole@index',
       ],*/
];