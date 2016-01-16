<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>获得邀请码-<?php echo ($SiteInfo["title"]); ?></title>
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
                <strong>获得邀请码</strong>
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
        <div class="col-lg-6">
            <center><h1>获得本站邀请码</h1></center>
                <div class="progress progress-striped active">
                                    <div style="width: 33%" class="progress-bar progress-bar-success">
                                        <span class="sr-only">30% Complete (success)</span>
                                    </div>
                                    <div style="width: 33%" class="progress-bar progress-bar-warning">
                                        <span class="sr-only">15% Complete (warning)</span>
                                    </div>
                                    <div style="width: 34%" class="progress-bar progress-bar-danger">
                                        <span class="sr-only">40% Complete (danger)</span>
                                    </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <i class="fa fa-info-circle"></i>为什么需要邀请码注册？
                        </div>
                        <div class="panel-body">
                        正如本站的名称一样，里程密，一个程序员里程的秘密，所以我们更希望这里是一个和谐干净的程序员呆的地方，<br>
                        而不希望这里像菜市场一样杂乱无章.
                        </div>
                    </div>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                        <i class="fa fa-info-circle"></i>邀请码是否收费？
                        </div>
                        <div class="panel-body">
                        我们都是程序员，程序员何苦为难程序员，要是打着为了网站干净的旗号收注册码的钱，那就真的是当婊子还立牌坊了<br>
                        开源的世界是没有收费这两个字的.
                        </div>
                    </div>
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                        <i class="fa fa-info-circle"></i>到底如何获取？
                        </div>
                        <div class="panel-body">
                        既然都是程序员，或者邀请码的方式肯定是和技术有关的，你可以写一篇技术文章分享给大家，<br>
                        然后把文章的配图和文章一起发送到管理员的邮箱：lcm1475@aliyun.com <br>
                        管理员通过审核之后就会把邀请码发到你的邮箱里<br>
                       <span style = "color:red;"> 还有一种情况是管理员开心了 会免费发送。。。</span>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <i class="fa fa-info-circle"></i>技术文章有什么要求？
                        </div>
                        <div class="panel-body">
                        <ul>
                            <li>
                                文章不要从百度复制，大家都不傻，这是最基本的要求了
                            </li>
                            <li>
                                是不是要技术水准很高？答案是不需要，只要是你用心写的，自己写的，写的怎么样都好，
                                哪个程序员不是从菜到神？
                            </li>
                            <li>
                                我发送到管理员邮箱多长时间才能收到验证码？基本上几个小时之内，因为管理员也是一只代码狗，也要上班.
                            </li>
                            <li>
                                配图要什么样的？随便你喜欢就好了，长方形的比例就好，因为你看到本站的所有文章都是带有配图的.
                            </li>
                            <li>
                                会员有什么权限？你可以有自己的博客，你可以在本站所有的分类下发帖子.
                            </li>
                        </ul>

                        </div>
                    </div>
        </div>
        <div class="col-lg-6">
        <center><h1>关于本站源代码</h1></center>
                <div class="progress progress-striped active">
                                    <div style="width: 33%" class="progress-bar progress-bar-success">
                                        <span class="sr-only">30% Complete (success)</span>
                                    </div>
                                    <div style="width: 33%" class="progress-bar progress-bar-warning">
                                        <span class="sr-only">15% Complete (warning)</span>
                                    </div>
                                    <div style="width: 34%" class="progress-bar progress-bar-danger">
                                        <span class="sr-only">40% Complete (danger)</span>
                                    </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <i class="fa fa-info-circle"></i>代码是否开源？
                        </div>
                        <div class="panel-body">
                        本站是无条件支持开源的
                        </div>
                    </div>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                        <i class="fa fa-info-circle"></i>源代码是否能下载？
                        </div>
                        <div class="panel-body">
                        可以
                        </div>
                    </div>
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                        <i class="fa fa-info-circle"></i>如何下载？
                        </div>
                        <div class="panel-body">
                        自己在网站上找....
                        </div>
                    </div>
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