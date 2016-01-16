<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>会员中心-<?php echo ($SiteInfo["title"]); ?></title>
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
<link href="/lichengmi/Public/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/lichengmi/Public/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="/lichengmi/Public/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>会员中心</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/lichengmi/index.php">首页</a>
            </li>
            <li>
                <a href="/lichengmi/index.php/Home/User/index">会员中心</a>
            </li>
            <li class="active">
                <strong>写文章</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<!-- 本页导航栏结束 -->

<!-- 正文开始 -->
<div class="wrapper wrapper-content fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                                <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <a class="btn btn-block btn-primary compose-mail" href="/lichengmi/index.php/Home/User/addArticle">写一篇文章</a>
                            <div class="space-25"></div>
                            <h5>我的信息</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="/lichengmi/index.php/Home/User/userInfo"> <i class="fa fa-inbox "></i> 基本信息 <span class="label label-navy pull-right">账号信息</span></a></li>
                                <li><a href="/lichengmi/index.php/Home/User/detail"> <i class="fa fa-envelope-o"></i>主页信息<span class="label label-danger pull-right">个人主页</span></a></li>
                                <li><a href="/lichengmi/index.php/Home/User/liuyan"> <i class="fa fa-certificate"></i> 我的留言<span class="label label-primary pull-right">查看留言</span></a></li>
                                <li><a href="javascript:void(0)" onclick="alert('暂未对外开放')"> <i class="fa fa-file-text-o"></i> 我的私信<span class="label label-info pull-right">TA的小纸条</span>
                                <li><a href="/lichengmi/index.php/Home/User/gonggao"> <i class="fa fa-trash-o"></i>我的通知<span class="label label-warning pull-right">管理员的公告</span></a></li>
                            </ul>
                            <h5>我的文章</h5>
                            <ul class="category-list" style="padding: 0">
                                <li><a href="/lichengmi/index.php/Home/User/myArticle"> <i class="fa fa-circle text-navy"></i>我发布的</a></li>
                            </ul>

                            <h5 class="tag-title">创业板块</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href="default.htm"><i class="fa fa-tag"></i> 暂未开放</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="col-lg-9 fadeInRight">
                        <div class="mail-box-header">
                            <h2>
                                写文章
                            </h2>
                        </div>
                        <div class="mail-box">
                            <div class="mail-body">
                                <form class="form-horizontal" action="/lichengmi/index.php/Home/User/doAddArticle" method="post" enctype= "multipart/form-data">
                                    <div class="form-group" ><label class="col-sm-2 control-label">标题：</label>

                                        <div class="col-sm-10"><input type="text" class="form-control" name = "title" require id = "title"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label" >分类：</label>

                                        <div class="col-sm-10">
                                            <select name="fid" id="" require id = "fidss" class="form-control" onchange="change(this)">
                                                <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" type = "<?php echo ($vo["type"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-2 control-label">图片：<span style = "color:red;">必须</span></label>

                                        <div class="col-sm-10"><input type="file" value="" name= "pic" ></div>
                                    </div>

                                    <div class="form-group" style="display:none;" id = "biaoqian"><label class="col-sm-2 control-label">电影标签：</label>

                                        <div class="col-sm-10"><input type="text" class="form-control" name = "biaoqian" require ></div>
                                    </div>

                                    <div class="form-group" style="display:none;" id = "pingfen"><label class="col-sm-2 control-label">评分0-100：</label>

                                        <div class="col-sm-10"><input type="text" class="form-control" name = "pingfen" require ></div>
                                    </div>

                                    <div class="form-group" style="display:none;" id = "mp3"><label class="col-sm-2 control-label">音乐文件：</label>

                                        <div class="col-sm-10"><input type="file" value="" name= "mp3" ></div>
                                    </div>


                                    <link href="/lichengmi/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
                                    <script type="text/plain" name="content" id="myEditor" style="width:100%;height:510px;">
                                    <p>里程密一直与你同在</p>
                                    </script>
                                    <div class="mail-body text-center tooltip-demo">
                                        <button  class="btn btn-sm btn-primary" id = "adds" type="submit"> 发布</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 正文结束 -->





<!-- 调用脚部文件 -->
<script type="text/javascript" src="/lichengmi/Public/umeditor/third-party/jquery.min.js"></script>
<script src="/lichengmi/Public/js/inspinia.js"></script>
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

<script type="text/javascript" charset="utf-8" src="/lichengmi/Public/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/lichengmi/Public/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/lichengmi/Public/umeditor/lang/zh-cn/zh-cn.js"></script>




    <!-- Custom and plugin javascript -->





<script>
    $(function(){
        var um = UM.getEditor('myEditor');
    })
</script>
<script>
    function change(s){
        a=$(s).find("option:selected").attr("type");
        if(a ==2){
            $("#biaoqian").css("display","none");
            $("#pingfen").css("display","none");
            $("#mp3").css("display","block");
            $("#pic2").css("display","none");
        }else if(a==3){
            $("#biaoqian").css("display","block");
            $("#pingfen").css("display","block");
            $("#mp3").css("display","none");
            $("#pic2").css("display","none");
        }else if(a==4){
            $("#biaoqian").css("display","none");
            $("#pingfen").css("display","none");
            $("#mp3").css("display","none");
            $("#pic2").css("display","none");
        }else{
            $("#biaoqian").css("display","none");
            $("#pingfen").css("display","none");
            $("#mp3").css("display","none");
            $("#pic2").css("display","none");
        }
    }
</script>