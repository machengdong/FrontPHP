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

if(!function_exists('dump'))
{
    /**
     * 获取客户端IP
     *
     * @return bool
     */
    function getIp()
    {
        return \Front\Request::getIp();
    }

    function mkdir_p($dir,$dirmode=0755){
        $path = explode('/',str_replace('\\','/',$dir));
        $depth = count($path);
        for($i=$depth;$i>0;$i--){
            if(file_exists(implode('/',array_slice($path,0,$i)))){
                break;
            }
        }
        for($i=0;$i<$depth;$i++){
            if($d= implode('/',array_slice($path,0,$i+1))){
                if(!is_dir($d)) mkdir($d,$dirmode);
            }
        }
        return is_dir($dir);
    }

    /**
     * @param array $data
     * @param bool $exit
     */
    function dump($data = [],$exit = false)
    {
        ob_start();
        var_dump($data);
        $out = ob_get_clean();

        if($exit) $site = 'top:0'; else $site='bottom:0';

        echo '<div id="_var_dump_" style="z-index:9999999;position:fixed;'.$site.';height:300px;font-size:14px;width:100%;background-color:#3c3839;color:#5cff00;overflow:scroll;overflow-y:scroll;">';
        echo '<p onclick="__noneDump()" style="color: red;">&nbsp;&nbsp;DUMP↩</p><pre>'.$out.'</pre><br></div>';

        $js = <<<js
<script>
if(getComputedStyle(document.body).margin != '0px')
{
    document.body.style.margin=0;
}
function __noneDump()
    {
        document.getElementById("_var_dump_").style.height="20px";
        document.getElementById("_var_dump_").style.width="70px";
    }
</script>
js;

        echo $js;
        if($exit)exit();
    }
}


