<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>基本信息-<?php echo ($SiteInfo["title"]); ?></title>
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

<link href=" /lichengmi/Public/shearphoto_common/css/ShearPhoto.css" rel="stylesheet" type="text/css" media="all"><!--CSS文件，有点废话-->
<script  type="text/javascript" src=" /lichengmi/Public/shearphoto_common/js/ShearPhoto.js" ></script><!--ShearPhoto的核心文件 截取，拖拽，HTML5切图，数据交互等都是由这个文件处理，全部由明哥先生汗水交织而成-->
<script  type="text/javascript"  src=" /lichengmi/Public/shearphoto_common/js/webcam_ShearPhoto.js" ></script> <!--在线拍照那个FLASH的接口，非技术性文件-->
<script  type="text/javascript"  src=" /lichengmi/Public/shearphoto_common/js/alloyimage.js" ></script>   <!--图片特效处理,他只负责特效，其他功能与这个文件完全无关，这个JS从腾讯AI文件  如你不要特效的话，顺带删除这个文件，在hendle.js设置关闭特效-->
<script  type="text/javascript"  src=" /lichengmi/Public/shearphoto_common/js/handle.js" ></script>
    <link href="/lichengmi/Public/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="/lichengmi/Public/css/plugins/cropper/cropper.min.css" rel="stylesheet">
<!-- 本页导航栏开始 -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>基本信息</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/lichengmi/index.php">首页</a>
            </li>
            <li>
                <a href="/lichengmi/index.php/Home/User">会员中心</a>
            </li>
            <li class="active">
                <strong>基本信息</strong>
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

            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
            <center>
                <h2>
                    基本信息
                </h2>
            </center>
        </div>
        <div class="mail-box" style="padding:10px;">
            <div class="form-group">
            <label>邮箱：</label>
                <input  class="form-control required" type="text" disabled="" value = "<?php echo ($userInfo["email"]); ?>">
            </div>
            <div class="form-group">
                <label>注册时间</label>
                <input  class="form-control required" type="text" disabled="" value = "<?php echo (date('Y-m-d H:i:s',$userInfo["ctime"])); ?>">
            </div>
            <div class="form-group">
                <label>上次登录时间</label>
                <input  class="form-control required" type="text" disabled="" value = "<?php echo (date('Y-m-d H:i:s',session('mlasttime'))); ?>">
            </div>
            <div class="form-group">
                <label>上次登录IP</label>
                <input  class="form-control required" type="text" disabled="" value = "<?php echo (session('mlastip')); ?>">
            </div>
            <div class="form-group">
                <label>账户状态</label>
                <input  class="form-control required" type="text" disabled="" <?php if($userInfo["status"] == 0): ?>value = "启用"<?php else: ?>value = "禁用"<?php endif; ?>>
            </div>
            <div class="form-group">
                <label>我的昵称</label>
                <input  class="form-control required" type="text" disabled="" value = "<?php echo ($userInfo["truename"]); ?>">
            </div>
            <center><h1>修改头像</h1></center>


                <div id="shearphoto_loading">程序加载中......</div><!--这是2.2版本加入的缓冲效果，JS方法加载前显示的等待效果-->
                     <div id="shearphoto_main">
                    <!--效果开始.............如果你不要特效，可以直接删了........-->
                    <div class="Effects" id="shearphoto_Effects" autocomplete="off">
                      <strong class="EffectsStrong">截图效果</strong>
                      <a href="javascript:;" StrEvent="原图" class="Aclick"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e0.jpg"/>原图</a>
                      <a href="javascript:;" StrEvent="美肤"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e1.jpg"/>美肤效果</a>
                      <a href="javascript:;" StrEvent="素描"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e2.jpg"/>素描效果</a>
                      <a href="javascript:;" StrEvent="自然增强"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e3.jpg" />自然增强</a>
                      <a href="javascript:;" StrEvent="紫调"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e4.jpg" />紫调效果</a>
                      <a href="javascript:;" StrEvent="柔焦"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e5.jpg"/>柔焦效果</a>
                      <a href="javascript:;" StrEvent="复古"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e6.jpg"/>复古效果</a>
                      <a href="javascript:;" StrEvent="黑白"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e7.jpg"/>黑白效果</a>
                      <a href="javascript:;" StrEvent="仿lomo"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e8.jpg"/>仿lomo</a>
                      <a href="javascript:;" StrEvent="亮白增强"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e9.jpg"/>亮白增强</a>
                      <a href="javascript:;" StrEvent="灰白"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e10.jpg"/>灰白效果</a>
                      <a href="javascript:;" StrEvent="灰色"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e11.jpg"/>灰色效果</a>
                      <a href="javascript:;" StrEvent="暖秋"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e12.jpg"/>暖秋效果</a>
                      <a href="javascript:;" StrEvent="木雕"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e13.jpg"/>木雕效果</a>
                      <a href="javascript:;" StrEvent="粗糙"><img src=" /lichengmi/Public/shearphoto_common/images/Effects/e14.jpg"/>粗糙效果</a>
                    </div>
                    <!--效果结束...........................如果你不要特效，可以直接删了.....................................................-->
                    <!--primary范围开始-->
                       <div class="primary">
                         <!--main范围开始-->
                            <div id="main">
                               <div class="point">
                                    </div>
                                    <!--选择加载图片方式开始-->
                                    <div id="SelectBox">
                                    <form    id="ShearPhotoForm" enctype="multipart/form-data" method="post"  target="POSTiframe">
                                    <input name="shearphoto" type="hidden" value="我要传参数" autocomplete="off"> <!--示例传参数到服务端，后端文件UPLOAD.php用$_POST['shearphoto']接收,注意：HTML5切图时，这个参数是不会传的-->
                                            <a href="javascript:;" id="selectImage"><input type="file"  name="UpFile" autocomplete="off"/></a>
                                     </form>
                                            <a href="javascript:;" id="PhotoLoading"></a>
                                            <a href="javascript:;" id="camerasImage"></a>
                                    </div>
                                    <!--选择加载图片方式结束--->
                                    <div id="relat">
                                            <div id="black">
                                            </div>
                                            <div id="movebox">
                                                    <div id="smallbox">
                                                            <img src=" /lichengmi/Public/shearphoto_common/images/default.gif" class="MoveImg" /><!--截框上的小图-->
                                                    </div>
                                                    <!--动态边框开始-->
                                                     <i id="borderTop">
                                                    </i>

                                                    <i id="borderLeft">
                                                    </i>

                                                    <i id="borderRight">
                                                    </i>

                                                    <i id="borderBottom">
                                                    </i>
                                                    <!--动态边框结束-->
                                                    <i id="BottomRight">
                                                    </i>
                                                    <i id="TopRight">
                                                    </i>
                                                    <i id="Bottomleft">
                                                    </i>
                                                    <i id="Topleft">
                                                    </i>
                                                    <i id="Topmiddle">
                                                    </i>
                                                    <i id="leftmiddle">
                                                    </i>
                                                    <i id="Rightmiddle">
                                                    </i>
                                                    <i id="Bottommiddle">
                                                    </i>
                                            </div>
                                            <img src=" /lichengmi/Public/shearphoto_common/images/default.gif" class="BigImg" /><!--MAIN上的大图-->
                                    </div>
                            </div>
                             <!--main范围结束-->
                              <div style="clear: both"></div>
                            <!--工具条开始-->
                            <div id="Shearbar">
                                    <a id="LeftRotate" href="javascript:;">
                                            <em>
                                            </em>
                                            向左旋转
                                    </a>
                                    <em class="hint L">
                                    </em>
                                    <div class="ZoomDist" id="ZoomDist">
                                            <div id="Zoomcentre">
                                            </div>
                                            <div id="ZoomBar">
                                            </div>
                                            <span class="progress">
                                            </span>
                                    </div>
                                    <em class="hint R">
                                    </em>
                                    <a id="RightRotate" href="javascript:;">
                                            向右旋转
                                            <em>
                                            </em>
                                    </a>
                                    <p class="Psava">
                                            <a id="againIMG"  href="javascript:;">重新选择</a>
                                            <a id="saveShear" href="javascript:;">保存截图</a>
                                    </p>
                            </div>
                            <!--工具条结束-->
                        </div>
                         <!--primary范围结束-->
                            <div style="clear: both"></div>
                            </div>
                    <!--shearphoto_main范围结束-->

                    <!--主功能部份 主功能部份的标签请勿随意删除，除非你对shearphoto的原理了如指掌，否则JS找不到DOM对象，会给你抱出错误-->
                     <!--相册-->
                    <div id="photoalbum"><!--假如你不要这个相册功能。把相册标签删除了，JS会抱出一个console.log()给你，注意查收，console.log的内容是告诉，某个DOM对象找不到-->
                    <h1>假如：这是一个相册--------试试点击图片</h1>
                    <i id="close"></i>
                    <ul>
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/1.jpg" serveUrl="file/photo/1.jpg" /></li>  <!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/2.jpg" serveUrl="file/photo/2.jpg" /></li>   <!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/3.jpg" serveUrl="file/photo/3.jpg" /></li>  <!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/4.jpg" serveUrl="file/photo/4.jpg" /></li> <!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/5.jpg" serveUrl="file/photo/5.jpg" /></li> <!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/6.jpg" serveUrl="file/photo/6.jpg" /></li> <!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/7.jpg" serveUrl="file/photo/7.jpg" /></li> <!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    <li><img src=" /lichengmi/Public/shearphoto_common/file/photo/8.jpg" serveUrl="file/photo/8.jpg" /></li><!--serveUrl 是对于服务器路径而言，一般不需要改动，如果index.html位置改变时，你只需要改动 src就可以-->
                    </ul>
                    </div>
                    <!--相册-->
                    <!--拍照-->
                    <div id="CamBox"><!--假如你不要这个拍照功能。把拍照标签删除了，JS会抱出一个console.log()给你，注意查收，console.log的内容是告诉，某个DOM对象找不到-->
                    <p class="lens"></p>
                    <div id="CamFlash"></div>
                    <p class="cambar">
                    <a href="javascript:;" id="CamOk"  >拍照</a>
                    <a href="javascript:;" id="setCam">设置</a>
                    <a href="javascript:;" id="camClose">关闭</a>
                    <span style="clear:both;"></span>
                    </p>
                    <div id="timing"></div>
                    </div>
            <hr>
            <center><h1>修改密码</h1></center>
            <form action="/lichengmi/index.php/Home/User/changePass" method="post">
                <div class="form-group">
                <label>输入密码</label>
                <input  class="form-control required" type="password" name = "passone">
            </div>
            <div class="form-group">
                <label>重复密码</label>
                <input  class="form-control required" type="password" name = "passtwo">
            </div>
            <button type="submit" class="btn btn-primary">确认修改</button>
            </form>
        </div>
    </div>
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