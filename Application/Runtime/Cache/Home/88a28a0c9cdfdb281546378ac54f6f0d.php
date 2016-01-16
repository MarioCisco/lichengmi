<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo ($fenleiInfo["name"]); ?>-<?php echo ($SiteInfo["title"]); ?></title>
    <meta name = "keywords" content="<?php echo ($SiteInfo["keywords"]); ?>" >
    <meta name = "description" content="<?php echo ($SiteInfo["description"]); ?>" >
    <link href="/lichengmi/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/lichengmi/Public/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/lichengmi/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/lichengmi/Public/css/animate.css" rel="stylesheet">
    <link href="/lichengmi/Public/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header" style="text-align:center;">
                        <div class="dropdown profile-element"> <span>
                        <a href="/lichengmi/index.php">
                            <img alt="image" class="img-circle" src="/lichengmi/Public/Uploads/<?php echo ($SiteInfo["logo"]); ?>" width="80px;"  height="80px;" />
                        </a>
                        </span>
                        <span class="clear"> <span class="block m-t-xs" style = "color:#fff;"> <strong class="font-bold"><?php echo ($SiteInfo["name"]); ?></strong>
                        </span> <span class="text-muted text-xs block"><?php echo ($SiteInfo["set_content"]); ?></span> </span>
                    </div>
                    <div class="logo-element">
                        <?php echo ($SiteInfo["name"]); ?>
                    </div>
                </li>
                <?php if(is_array($fenleiListone)): foreach($fenleiListone as $key=>$vo): ?><li class="">
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label"><?php echo ($vo["name"]); ?></span><span class="fa arrow"></span></a>
                    <ul style="height: 0px;" aria-expanded="false" class="nav nav-second-level collapse">
                        <?php if(is_array($fenleiListtwo)): foreach($fenleiListtwo as $key=>$vs): if($vo["id"] == $vs['fid']): ?><li><a href="/lichengmi/index.php/Home/Fenlei/index/id/<?php echo ($vs["id"]); ?>"><?php echo ($vs["name"]); ?></a></li><?php endif; endforeach; endif; ?>
                    </ul>
                </li><?php endforeach; endif; ?>
                <li>
                    <a href="/lichengmi/index.php/Home/Message"><i class="fa fa-globe"></i> <span class="nav-label">留言板</span><span class="label label-info pull-right">NEW</span></a>
                </li>
                <li>
                    <a href="/lichengmi/index.php/Home/Userlist"><i class="fa fa-globe"></i> <span class="nav-label">本站会员</span></a>
                </li>
                <li>
                    <a href="/lichengmi/index.php/Home/Index/yaoqingma"><i class="fa fa-globe"></i> <span class="nav-label" style = "color:#ED5565;">邀请码与源代码</span></a>
                </li>
                    </ul>

                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                            <form role="search" class="navbar-form-custom" action="/lichengmi/index.php/Home/Index/serch" method="get">
                                <div class="form-group">
                                    <input type="text" placeholder="搜索框在这里......" class="form-control" name="keywords" id="top-search" required>
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">欢迎来到<?php echo ($SiteInfo["name"]); ?>，有你代码，有你的风格！</span>
                            </li>
                        <?php if($_SESSION['muser']!= ''): ?><li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="javascript:void(0)">
                                    <i class="fa fa-envelope"></i>  <span class="label label-warning">家</span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <div class="media-body">
                                                <strong><a href="/lichengmi/index.php/Home/User/index">进入会员中心</a></strong>. <br>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <div class="media-body ">
                                                <strong><a href="/lichengmi/index.php/Home/User/logout">退出登陆</a></strong>. <br>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                                <i class="fa fa-envelope"></i> <strong>里程密和你在一起</strong>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        <li>欢迎你，<?php echo (session('muser')); ?></li>
                        <?php else: ?>
                            <li>
                                <a data-toggle="modal" href="#myModal6">注册</a>
                            </li>
                            <li>
                                <a data-toggle="modal" href="#modal-form">登陆</a>
                            </li><?php endif; ?>
                        </ul>

                    </nav>
                </div>
                <!-- 登陆在这里开始 -->
                <div style="display: none;" class="modal inmodal fade in" id="modal-form" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">登陆中心</h4>
                            </div>
                            <div class="modal-body">

                                <form class="form-horizontal" action="/lichengmi/index.php/Home/User/login" method="post">
                                    <p>没有账号可不要乱登陆哦</p>
                                    <div class="form-group"><label class="col-lg-2 control-label">邮箱</label>

                                        <div class="col-lg-10"><input placeholder="请输入邮箱" class="form-control" type="email" name = "email" required>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">密码</label>

                                        <div class="col-lg-10"><input placeholder="请输入密码" class="form-control" type="password" name = "password" required></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-7">
                                            <button class="btn btn-sm btn-white" type="submit">点击登陆</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- 登陆结束 -->


                <!-- 注册开始 -->
                <div style="display: none;" class="modal inmodal fade in" id="myModal6" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">注册中心</h4>
                            </div>
                            <div class="modal-body">

                                <form class="form-horizontal" action="/lichengmi/index.php/Home/User/reg" method="post">
                                    <p>注册的前提是你必须有邀请码.</p>
                                    <div class="form-group"><label class="col-lg-2 control-label">邮箱</label>

                                        <div class="col-lg-10"><input placeholder="请输入邮箱" class="form-control" type="email" required name = "email">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">密码</label>

                                        <div class="col-lg-10"><input placeholder="请输入密码" class="form-control" type="password" required name = "password"></div>
                                    </div>
                                     <div class="form-group"><label class="col-lg-2 control-label" >昵称</label>

                                        <div class="col-lg-10"><input placeholder="请输入昵称（一旦注册无法修改！）" class="form-control" type="text" required name = "truename">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label" >邀请码</label>

                                        <div class="col-lg-10"><input placeholder="请输入邀请码" class="form-control" type="text" required name = "code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-7">
                                            <button class="btn btn-sm btn-white" type="submit">点击注册</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- 注册结束 -->



<!-- 本页导航栏开始 -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>首页</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/lichengmi/index.php">首页</a>
            </li>
            <li class="active">
                <strong><?php echo ($fenleiInfo["name"]); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<!-- 本页导航栏结束 -->

<!-- 正文开始 -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <?php if($fenleiInfo["type"] == 1): ?><style>
                .button_link{display:inline-block;position:relative;text-decoration:none;font-size:15px;color:#33ab6a;font-weight:bold;width:100%;height:100%;border:2px solid rgba(225,255,255,.8);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-transition:0.4s;-o-transition:0.4s;transition:0.4s;}
                .button_link:hover{border:2px solid rgba(255,255,255,1);}
                .button_link .line{display:inline-block;background-color:#BABABA ;position:absolute;-webkit-transition:0.5s ease;-o-transition:0.5s ease;transition:0.5s ease;}
                .button_link .line_top{height:2px;width:0;left:-50%;top:-2px;}
                .button_link:hover .line_top{width:100%;left:-2px;}
                .button_link .line_right{height:0;width:2px;top:-50%;right:-2px;}
                .button_link:hover .line_right{height:100%;top:-2px;}
                .button_link .line_bottom{width:2px;height:0;bottom:-50%;left:-2px;}
                .button_link:hover .line_bottom{height:100%;bottom:-2px;}
                .button_link .line_left{height:2px;width:0;right:-50%;bottom:-2px;}
                .button_link:hover .line_left{width:100%;right:-2px;}
            </style>
                <div class="row">
                    <?php if(is_array($articleList)): foreach($articleList as $key=>$vo): ?><div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-2" >
                                       <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>" class="button_link">
                                        <img alt="image" class="img-responsive" src="/lichengmi/Public/Uploads/<?php echo ($vo["pic"]); ?>" style="min-height:120px;">
                                        <span class="line line_top"></span>
                                        <span class="line line_right"></span>
                                        <span class="line line_bottom"></span>
                                        <span class="line line_left"></span>
                                        </a>
                                    </div>
                                    <div class="col-lg-10">
                                        <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>" class="btn-link">
                                            <h2>
                                                <?php echo (msubstr($vo["title"],0,25,'utf-8',false)); ?>
                                            </h2>
                                        </a>
                                        <p>
                                            <?php echo (msubstr(strip_tags($vo["content"]),0,160,'utf-8',true)); ?> <br>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-10" >
                                                <span class="label label-primary" style="font-size:12px;">作者：<?php echo ($vo["truename"]); ?></span>
                                                <span class="label label-info"   style="font-size:12px;">查看：<?php echo ($vo["view"]); ?></span>
                                                <span class="label label-warning"   style="font-size:12px;">时间：<?php echo (date( "Y-m-d",$vo["ctime"])); ?></span>

                                            </div>
                                            <div class="col-md-2" style="margin-top:10px;">
                                                <div class="small text-right">
                                                    <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><button type="button" class="btn btn-w-m btn-danger">查看全文</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div><?php endforeach; endif; ?>
                </div>
                    <?php elseif($fenleiInfo["type"] == 2): ?>
                        <link rel="stylesheet" type="text/css" href="/lichengmi/Public/doudong/css/type2.css" />
                    <div class = "row">
                        <?php if(is_array($articleList)): foreach($articleList as $key=>$vo): ?><div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div>
                                        <div class="ibox-content no-padding border-left-right" >
                                        <div class="grid">
                                        <figure class="effect-layla">
                                            <img alt="image" class="img-responsive" src="/lichengmi/Public/Uploads/<?php echo ($vo["pic"]); ?>" style="width:100%;max-height:300px;">
                                            <figcaption>
                                            <h2><?php echo (msubstr(strip_tags($vo["title"]),0,20,'utf-8',false)); ?></h2>
                                            <p><?php echo (msubstr(strip_tags($vo["content"]),0,20,'utf-8',true)); ?></p>
                                            <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>">View more</a>
                                        </figcaption>
                                        </figure>
                                        </div>

                                        </div>
                                        <div class="ibox-content profile-content" style="padding:10px;">
                                            <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><center><h2><strong><?php echo ($vo["title"]); ?></strong></h2></center></a>
                                            <p><?php echo (msubstr(strip_tags($vo["content"]),0,100,'utf-8',true)); ?></p>
                                            <span class="label label-primary" style="font-size:12px;">作者：<?php echo ($vo["truename"]); ?></span>
                                            <span class="label label-info"   style="font-size:12px;">查看：<?php echo ($vo["view"]); ?></span>
                                            <span class="label label-warning"   style="font-size:12px;">时间：<?php echo (date( "Y-m-d",$vo["ctime"])); ?></span>
                                            <p>
                                            </p>
                                            <div class="user-button">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><button type="button" class="btn btn-danger btn-sm btn-block"><i class="fa fa-envelope"></i>点击阅读</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; ?>

                    <?php elseif($fenleiInfo["type"] == 3): ?>
                    <link rel="stylesheet" type="text/css" href="/lichengmi/Public/doudong/css/type2.css" />
                    <div class="row">

                        <?php if(is_array($articleList)): foreach($articleList as $key=>$vo): ?><div class="col-lg-4">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h4><?php echo (msubstr($vo["title"],0,10,'utf-8',false)); ?></h4>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="grid">
                                        <figure class="effect-goliath">
                                            <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><img alt="member" src="/lichengmi/Public/Uploads/<?php echo ($vo["pic"]); ?>" width="100%"></a>
                                        <figcaption style="text-align:center;">
                    <p ><?php echo ($vo["biaoqian"]); ?></p>
                    <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>">View more</a>
                        </figcaption>
                                        </figure>
                                        </div>

                                        <center><h2><?php echo (msubstr($vo["title"],0,10,'utf-8',false)); ?></h2></center>
                                        <p>
                                            <?php echo (htmlspecialchars_decode(msubstr($vo["content"],0,70,'utf-8',true))); ?>
                                        </p>
                                        <div>
                                            <span>个人对电影的评分:</span>
                                            <div class="stat-percent"><?php echo ($vo["pingfen"]); ?>分</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo ($vo["pingfen"]); ?>%;" class="progress-bar"></div>
                                            </div>
                                        </div>
                                        <div class="row  m-t-sm">
                                            <div class="col-sm-12">
                                            <span class="label label-warning" style="font-size:12px;">作者：<?php echo ($vo["truename"]); ?></span>
                                            <span class="label label-success"  style="font-size:12px;">评论：<?php echo ($vo["comment"]); ?></span>
                                            <span class="label label-info"   style="font-size:12px;">查看：<?php echo ($vo["view"]); ?></span>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><button type="button" class="btn btn-danger btn-sm btn-block"><i class="fa fa-envelope"></i>点击阅读</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><?php endforeach; endif; ?>

                        <?php elseif($fenleiInfo["type"] == 4): ?>
                            <link rel="stylesheet" type="text/css" href="/lichengmi/Public/doudong/css/tilteffect.css" />
                            <link rel="stylesheet" type="text/css" href="/lichengmi/Public/doudong/css/demo.css" />



                        <div class="row">
                            <div class="col-lg-8">

                                <?php if(is_array($articleList)): foreach($articleList as $key=>$vo): ?><div class="row">
                                    <div class="col-lg-12">
                                            <div class="content">
                                            <ul class="grid grid--xray" style="padding-left:0px;">
                                            <li class="grid__item">
                        <div class="grid__img grid__img--border">
                            <img src="/lichengmi/Public/Uploads/<?php echo ($vo["pic"]); ?>" class="tilt-effect" data-tilt-options='{ "bgfixed" : false, "movement": { "perspective" : 1000, "translateX" : 30, "translateY" : 30, "translateZ" : -50, "rotateX" : 3, "rotateY" : 3, "rotateZ" : 10 } }' alt="grid01"  width="100%;" />
                        </div>
                    </li>
                    </ul>
                                            </div>
                                        </div>
                                        </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                    <div class="ibox-content profile-content" style="padding:10px;">
                                            <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><center><h2><strong><?php echo ($vo["title"]); ?></strong></h2></center></a>
                                            <p><?php echo (msubstr(strip_tags($vo["content"]),0,160,'utf-8',true)); ?></p>
                                            <span class="label label-primary" style="font-size:12px;">作者：<?php echo ($vo["truename"]); ?></span>
                                            <span class="label label-info"   style="font-size:12px;">查看：<?php echo ($vo["view"]); ?></span>
                                            <span class="label label-warning"   style="font-size:12px;">时间：<?php echo (date( "Y-m-d",$vo["ctime"])); ?></span>
                                            <p>
                                            </p>
                                            <div class="user-button">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><button type="button" class="btn btn-danger btn-sm btn-block"><i class="fa fa-envelope"></i>点击阅读</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <hr><?php endforeach; endif; ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            心情栏目
                                        </div>
                                        <div class="panel-body">
                                            假<br>装<br>这<br>里<br>有<br>一<br>个<br>广<br>告
                                        </div>
                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            心情栏目
                                        </div>
                                        <div class="panel-body">
                                            假<br>装<br>这<br>里<br>有<br>一<br>个<br>广<br>告
                                        </div>
                                    </div>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            心情栏目
                                        </div>
                                        <div class="panel-body">
                                            假<br>装<br>这<br>里<br>有<br>一<br>个<br>广<br>告
                                        </div>
                                    </div>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            心情栏目
                                        </div>
                                        <div class="panel-body">
                                            假<br>装<br>这<br>里<br>有<br>一<br>个<br>广<br>告
                                        </div>
                                    </div>
                            </div>
                            <script src="/lichengmi/Public/doudong/js/tiltfx.js"></script><?php endif; ?>
                    </div>
                    <div class= "text-center"><?php echo ($page); ?></div>
                </div>
            </div>
        </div>
        <!-- 正文结束 -->

        <!-- 调用脚部文件 -->
                <div class="footer">
            <div class="pull-right">
                作为一个开源程序员 <strong>如果你使用本站程序</strong> 请保留友情链接.
            </div>
            <div>
                <strong>Copyright</strong> <a href="http://www.lcm.wang/">里程密</a> &copy; 2014-2016
                管理员邮箱：<?php echo ($SiteInfo["admin_email"]); ?>
            </div>
        </div>

        </div>
        </div>

    <script src="/lichengmi/Public/js/jquery-2.1.1.js"></script>
    <script src="/lichengmi/Public/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/lichengmi/Public/js/bootstrap.min.js"></script>
    <script src="/lichengmi/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/lichengmi/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/lichengmi/Public/js/inspinia.js"></script>
    <script src="/lichengmi/Public/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="/lichengmi/Public/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Jvectormap -->
    <script src="/lichengmi/Public/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/lichengmi/Public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Flot -->
    <script src="/lichengmi/Public/js/plugins/flot/jquery.flot.js"></script>
    <script src="/lichengmi/Public/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/lichengmi/Public/js/plugins/flot/jquery.flot.resize.js"></script>
    <script>
        var s_url=window.location.pathname;
        var now_url = '';
        for(var i = 0;i<$("#side-menu li").length;i++){
            now_url=$("#side-menu li a").eq(i).attr("href");
            if(now_url == s_url){
                $("#side-menu a").eq(i).parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().parent().addClass("active");
                $("#side-menu a").eq(i).parent().parent().addClass("in");
            }else{
                $("#side-menu a").eq(i).parent().removeClass("active");
            }
        }
        </script>
</body>

</html>