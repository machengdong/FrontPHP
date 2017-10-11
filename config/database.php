<?php
/**
 * Created by PhpStorm.
 * User: lru
 * Date: 2017/10/10
 * Time: 下午5:43
 */

return[
    'default' => [
        'db_host'=>'127.0.0.1',
        'db_name'=>'demo',
        'db_user'=>'root',
        'db_pass'=>'root',
    ],
    'master' => [
        'db_host'=>'127.0.0.2',
        'db_name'=>'demo',
        'db_user'=>'root',
        'db_pass'=>'root',
    ],
    'standby' => [
        'db_host'=>'127.0.0.3',
        'db_name'=>'demo',
        'db_user'=>'root',
        'db_pass'=>'root',
    ],
];