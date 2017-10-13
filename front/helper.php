<?php

if(!function_exists('dump'))
{
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


