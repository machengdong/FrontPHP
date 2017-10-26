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


class Shell
{
    public function __construct($config)
    {

    }

    public static function init(array $config)
    {
       return new self($config);
    }

    public function run()
    {
        if(isset($_SERVER['argv'][1]))
        {

        }else
            $this->boot();
    }

    public function prePrint()
    {
        echo 'Base'.' Shell '.'V 1'.'0'."\n";
    }

    private function boot()
    {
        ignore_user_abort(false);
        ob_implicit_flush(1);
        ini_set('implicit_flush',true);
        $this->prePrint();
        $i = 1;
        while (1)
        {
            $line = readline($i++." #> ");
            readline_add_history($line);

        }

    }
}

if(!function_exists('readline')){
    function readline($prompt){
        echo $prompt;
        $input = '';
        while(1){
            $key = fgetc(STDIN);
            switch($key){
                case "\n":
                    return $input;
                default:
                    $input .= $key;
            }
        }
    }
    function readline_add_history($line){}

    function readline_completion_function($callback){}
}