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


class Config
{
    public static function get($key,$default = null)
    {
        list($files,$item) = self::parseKey($key);
        $config_info = self::load($files);
        if(!$item) return $config_info;
        if(array_key_exists($item,$config_info)) return $config_info[$item];
        return $default;
    }

    private static function load($files)
    {
        return require ROOT_PATH.'/../config/'.$files.'.php';
    }

    static private function parseKey($key)
    {
        $segments   =  explode('.', $key);
        $configFile = $segments[0];
        if (count($segments) == 1){
            return array($configFile, null);
        }else{
            return array($configFile, $segments[1]);
        }
    }
}