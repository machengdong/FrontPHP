<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <link type="text/css" href="_CSS_admin/desktop.css" rel="stylesheet">
    <script src="<?php echo DOCUMENT_ROOT; ?>js/jquery-1.11.3.js"></script>
</head>
<style>
    ul li
    {
        list-style-type:none;
    }
    a
    {
        text-decoration:none;
    }

    .desktop-top{
        background-color: #51e4ae;
        color: #FFFFFF;
    }

    .desktop-left{
        background-color: #333;
        color: #FFFFFF;
    }
</style>
<body class="desktop-left">
<div id="admin-menus">
    <ul>
        {volist name="menus" id="vo"}
        <li>
            <p class="top-level-menu">{$vo.os_menusname} <span>▲</span></p>
            <div style="display: none">
                {volist name="vo.sublevel" id="sublevel"}
                <p style="font-size: 16px;">
                    <a style="color: lavender;" href="{$sublevel.os_menusurl}" target="frame_center">{$sublevel.os_menusname} ☞</a>
                </p>
                {/volist}
            </div>
        </li>
        {/volist}

    </ul>
</div>
<script>
$(document).ready(function(){
    $(".top-level-menu").click(function(){
        $(".top-level-menu").next('div').hide();
        $(".top-level-menu").contents('span').html('▲');
        $(this).contents('span').html('▼');
        $(this).next('div').show();
    });
})
</script>
</body>
</html>
