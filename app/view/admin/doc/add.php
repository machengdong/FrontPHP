<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

</head>
<body>
    <form method="post" action="/admin/doc/dopublish.html">
        <div style="height: 38px; width:100%;"><input type="submit" value="发布" style="height: 30px;width:50px;background-color: #2295e6;position: absolute;right: 8px;"></div>

        <div>文档标题： <input type="text" value="" name="title" style="width: 100%;height: 28px; font: inherit;"></div>

        <br/>
        文档内容：
        <div id="container" style="height: 300px;"></div>
        <br/>
    </form>
</body>
<script src="<?php echo DOCUMENT_ROOT; ?>js/ueditor/ueditor.config.js"></script>
<script src="<?php echo DOCUMENT_ROOT; ?>js/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
</html>
