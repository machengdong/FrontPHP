<!DOCTYPE html>
<!--1、指定语言基础-->
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <!--2、指定视口信息-viewport-->
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
    <!--3、指定 跨IE 浏览器的兼容性-->
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title></title>
    <!--4、引入 bootstrap.css 主css文件-->
    <link rel="stylesheet" href="<?php echo DOCUMENT_ROOT; ?>css/bootstrap.css"/>
    <!--5、引入两个 兼容性 js文件-->
    <!--[if lt IE 9]-->
    <script src="<?php echo DOCUMENT_ROOT; ?>js/html5shiv.min.js"></script>
    <script src="<?php echo DOCUMENT_ROOT; ?>js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <div class="row">
        <!--1、左侧：sm以及以上占3列，xs下是隐藏-->
        <div class="col-sm-3 hidden-xs">
            <!--1、上：面板-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">作者</h3>
                </div>
                <div class="panel-body">
                    <img src="<?php echo DOCUMENT_ROOT; ?>images/1.jpeg" class="img-circle img-responsive">
                </div>
            </div>
            <!--2、下：列表组-->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                               aria-expanded="true" aria-controls="collapseOne">
                                菜单一
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div id="collapseListGroup1" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="collapseListGroupHeading1" aria-expanded="true">
                                <ul class="list-group">
                                    <li class="list-group-item" href="./get.html">二级菜单1</li>
                                    <li class="list-group-item" href="./v.html">二级菜单2</li>
                                    <li class="list-group-item">二级菜单3</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                菜单二
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div id="collapseListGroup2" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="collapseListGroupHeading2" aria-expanded="true">
                                <ul class="list-group">
                                    <li class="list-group-item">二级菜单4</li>
                                    <li class="list-group-item">二级菜单5</li>
                                    <li class="list-group-item">二级菜单6</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                菜单三
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div id="collapseListGroup3" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="collapseListGroupHeading3" aria-expanded="true">
                                <ul class="list-group">
                                    <li class="list-group-item">二级菜单7</li>
                                    <li class="list-group-item">二级菜单8</li>
                                    <li class="list-group-item">二级菜单9</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--2、右侧：sm以及以上占9列，xs下占12列-->
        <div class="embed-responsive embed-responsive-16by9">
            <div class="col-sm-9">
                <!--1、面包屑导航-->
                <!--<ul class="breadcrumb">-->
                <!--<li>-->
                <!--<a href="#">主页</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="#">HTML5</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--表单2.0-->
                <!--</li>-->
                <!--</ul>-->
                <!--2、3级标题-->
                <h3>表单2.0 新特性</h3>
                <!--3、水井-->
                <div class="well">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequatur id magnam nihil
                    nostrum possimus, ratione rem repellat! Amet cupiditate dolorem eaque exercitationem, fugiat hic ipsum
                    numquam officiis quam voluptate?
                </div>
                <!--4、文本-->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aspernatur debitis deleniti
                    deserunt dolorum fugit id ipsum perferendis rerum sed sunt velit, voluptates! Animi illum libero
                    nesciunt quia quod!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aspernatur debitis deleniti
                    deserunt dolorum fugit id ipsum perferendis rerum sed sunt velit, voluptates! Animi illum libero
                    nesciunt quia quod!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aspernatur debitis deleniti
                    deserunt dolorum fugit id ipsum perferendis rerum sed sunt velit, voluptates! Animi illum libero
                    nesciunt quia quod!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aspernatur debitis deleniti
                    deserunt dolorum fugit id ipsum perferendis rerum sed sunt velit, voluptates! Animi illum libero
                    nesciunt quia quod!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aspernatur debitis deleniti
                    deserunt dolorum fugit id ipsum perferendis rerum sed sunt velit, voluptates! Animi illum libero
                    nesciunt quia quod!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aspernatur debitis deleniti
                    deserunt dolorum fugit id ipsum perferendis rerum sed sunt velit, voluptates! Animi illum libero
                    nesciunt quia quod!</p>
                <!--5、标题 + 媒体列表-->
                <h3>评论列表</h3>
                <ul class="media-list">
                    <li class="media">
                        <div class="media-left">
                            <img src="<?php echo DOCUMENT_ROOT; ?>images/1.jpeg" width="80">
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">用户名</h4>
                            <p>评论内容：xxxxxx</p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <img src="<?php echo DOCUMENT_ROOT; ?>images/4.jpeg" width="80">
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">用户名</h4>
                            <p>评论内容：xxxxxx</p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <img src="<?php echo DOCUMENT_ROOT; ?>images/1.jpeg" width="80">
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">用户名</h4>
                            <p>评论内容：xxxxxx</p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <img src="<?php echo DOCUMENT_ROOT; ?>images/3.jpeg" width="80">
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">用户名</h4>
                            <p>评论内容：xxxxxx</p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <img src="<?php echo DOCUMENT_ROOT; ?>images/4.jpeg" width="80">
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">用户名</h4>
                            <p>评论内容：xxxxxx</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
    <div class="row" style="position:fixed;bottom:10px;">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="说点什么">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">评论</button>
              </span>
            </div>
        </div>
    </div>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<!--6、引入 两个JS插件文件-->
<script src="<?php echo DOCUMENT_ROOT; ?>js/jquery-1.11.3.js"></script>
<script src="<?php echo DOCUMENT_ROOT; ?>js/bootstrap.js"></script>
<!--7、引入检查文件-->
<script src="<?php echo DOCUMENT_ROOT; ?>js/bootlint.js"></script>

<script>
    //bootlint.showLintReportForCurrentDocument([]);
    $('.list-group-item').click(function () {
        $('.embed-responsive-item').attr('src',$(this).attr('href'));
    });
</script>
</body>
</html>