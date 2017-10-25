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

class Session
{
    protected static $init   = null;

    protected static $start;

    public static function init(array $config = [])
    {
        $_start = true;
        // session驱动
        $class = \Front\Driver\session\File::class;

        session_name(SESSION_NAME);
        // 检查驱动类
        if (!class_exists($class) || !session_set_save_handler(new $class())) {
            //todo
        }
        //session_start();
        //self::$init = true;
        if ($_start && !SWOOLE_SERVER) {
            session_start();
            self::$init = true;
        } else {
            self::$init = false;
        }
    }

    public static function boot()
    {
        if (is_null(self::$init)) {
            self::init();
        } elseif (false === self::$init && SWOOLE_SERVER) {
            if (PHP_SESSION_ACTIVE != session_status()) {
                session_start();
            }
            self::$init = true;
        }
    }

    public static function set($name, $value = '')
    {
        empty(self::$init) && self::boot();

        $_SESSION[$name] = $value;

        SWOOLE_SERVER && self::__start()->write();
    }

    public static function get($name = '')
    {
        empty(self::$init) && self::boot();

        SWOOLE_SERVER && self::__start()->read();

        $value = isset($_SESSION[$name]) ? $_SESSION[$name] : null;

        return $value;
    }

    public static function pull($name)
    {
        $result = self::get($name);
        if ($result) {
            self::delete($name);
            return $result;
        } else {
            return;
        }
    }

    public static function delete($name)
    {
        empty(self::$init) && self::boot();

        unset($_SESSION[$name]);
    }

    public static function clear()
    {
        empty(self::$init) && self::boot();

        $_SESSION = [];

    }

    public static function start()
    {
        session_start();
        self::$init = true;
    }

    public static function destroy()
    {
        if (!empty($_SESSION)) {
            $_SESSION = [];
        }
        session_unset();
        session_destroy();
        self::$init = null;
    }

    public static function pause()
    {
        // 暂停session
        session_write_close();
        self::$init = false;
    }

    private static function __start()
    {
        if(!isset(self::$start))
            self::$start = new \Front\Driver\session\Custom();
        return self::$start;
    }
}
