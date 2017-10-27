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



class Kernel
{

    public static function boot($path_info = null)
    {
        try{
            set_error_handler([\Front\kernel::class, 'applyError']);

            !empty($path_info) or $path_info = Request::getPathInfo();

            Routes::dispatch($path_info);

        }catch (\Exception $e)
        {
            self::exceptionHandle($e);
        }
    }


    public static function applyError($errno, $errstr, $errfile, $errline)
    {
        if (!(error_reporting() & $errno))
        {
            $err = "Message: {$errstr} Code: {$errno} File: {$errfile} Line: {$errline}";
            Log::error($err);
        }
        else
            throw new \Exception($errstr,$errno);

    }

    public static function exceptionHandle($e)
    {
        error_reporting(E_ALL & ~E_NOTICE);
        $message = $e->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();
        $html = "<p style='background-color: red;'>{$message} --- {$file} --- {$line}</p>";
        foreach (debug_backtrace() as $item)
        {
            $html .= "<div>File: {$item['file']} Function: {$item['function']} Line: {$item['line']}</div>";
        }

        \Front\Response::end($html);
    }
}