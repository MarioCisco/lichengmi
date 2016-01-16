<?php if (!defined('THINK_PATH')) exit();?><!-- 调用头部文件 -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo ($articleInfo["title"]); ?>-<?php echo ($SiteInfo["title"]); ?></title>
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
        <h2><?php echo ($articleInfo["title"]); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="/lichengmi/index.php">首页</a>
            </li>
            <li>
                <a href="/lichengmi/index.php/Home/Fenlei/index/id/<?php echo ($fenleiInfo["id"]); ?>"><?php echo ($fenleiInfo["name"]); ?></a>
            </li>
            <li class="active">
                <strong><?php echo ($articleInfo["title"]); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    <input type="hidden" id = "id" value= "<?php echo ($articleInfo["id"]); ?>">
    <input type="hidden" id = "userid" value= "<?php echo ($articleInfo["uid"]); ?>">
    </div>
</div>
<!-- 本页导航栏结束 -->

<!-- 正文开始 -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-9">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="text-center article-title" style="margin:20px 0px 20px">
                            <span class="text-muted">
                                <h1>
                                    <?php echo ($articleInfo["title"]); ?>
                                </h1>
                            </div>
                            <div style="margin-bottom:50px;">
                            <?php switch($fenleiInfo["type"]): case "1": ?><img src="/lichengmi/Public/Uploads/<?php echo ($articleInfo["pic"]); ?>" alt="" style="width:100%"><?php break;?>
                            <?php case "2": ?><!-- 音乐 -->
                            <link rel="stylesheet" href="/lichengmi/Public/music/css/lanrenzhijia.css" type="text/css" />
                                <div class="music-player">
                                  <div class="info">
                                    <div class="left"> <a href="javascript:;" class="icon-shuffle"></a> <a href="javascript:;" class="icon-heart"></a> </div>
                                    <div class="center">
                                      <div class="jp-playlist">
                                        <ul>
                                          <li></li>
                                        </ul>
                                      </div>
                                    </div>
                                    <div class="right"> <a href="javascript:;" class="icon-repeat"></a> <a href="javascript:;" class="icon-share"></a> </div>
                                    <div class="progress jp-seek-bar"> <span class="jp-play-bar" style="width: 0%"></span> </div>
                                  </div>
                                  <div class="controls">
                                    <div class="current jp-current-time">00:00</div>
                                    <div class="play-controls">
                                        <a href="javascript:;" class="icon-previous jp-previous" title="previous"></a>
                                        <a href="javascript:;" class="icon-play jp-play" title="play"></a>
                                        <a href="javascript:;" class="icon-pause jp-pause" title="pause"></a>
                                        <a href="javascript:;" class="icon-next jp-next" title="next"></a>
                                     </div>
                                    <div class="volume-level jp-volume-bar">
                                        <span class="jp-volume-bar-value" style="width: 0%"></span>
                                            <a href="javascript:;" class="icon-volume-up jp-volume-max" title="max volume"></a>
                                            <a href="javascript:;" class="icon-volume-down jp-mute" title="mute"></a>
                                    </div>
                                  </div>
                                  <div id="jquery_jplayer" class="jp-jplayer"></div>
                                </div>
                                <script src="/lichengmi/Public/music/js/jquery.min.js"></script>
                                <script src='/lichengmi/Public/music/js/jquery.jplayer.min.js'></script>
                                <script src='/lichengmi/Public/music/js/jplayer.playlist.min.js'></script>
                                <script>
                                    $(document).ready(function(){


                                      var playlist = [{
                                          title:"<?php echo ($articleInfo["title"]); ?>",
                                          artist:"<?php echo ($userInfo["truename"]); ?>",
                                          mp3:"/lichengmi/Public/Uploads/<?php echo ($articleInfo["mp3"]); ?>",
                                          //oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg",
                                          poster: "/lichengmi/Public/Uploads/<?php echo ($articleInfo["pic"]); ?>"
                                        }];

                                      var cssSelector = {
                                        jPlayer: "#jquery_jplayer",
                                        cssSelectorAncestor: ".music-player"
                                      };

                                      var options = {
                                        swfPath: "http://cdnjs.cloudflare.com/ajax/libs/jplayer/2.6.4/jquery.jplayer/Jplayer.swf",
                                        supplied: "ogv, m4v, oga, mp3"
                                      };

                                      var myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);

                                    });
                                </script>
                                <!-- 音乐 --><?php break;?>
                            <?php case "3": ?><img src="/lichengmi/Public/Uploads/<?php echo ($articleInfo["pic"]); ?>" alt="" style="width:100%"><?php break;?>
                            <?php default: ?>
                                <img src="/lichengmi/Public/Uploads/<?php echo ($articleInfo["pic"]); ?>" alt="" style="width:100%"><?php endswitch;?>

                            </div>

                                <div id = "beijing">
                            <p style="font-size:14px;" class="text2" >
                            <?php if($fenleiInfo["type"] == 4): echo (strip_tags($articleInfo["content"])); ?>
                                <?php else: ?>
                                <?php echo ($articleInfo["content"]); endif; ?>
                            </p>
                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-md-12">
                                <h1>回复列表</h1>
                                <div id="pinglun">

                                    </div>
                                    <button class="btn btn-primary btn-block m" id = "show" onclick="replay()" style="margin:0px;"><i class="fa fa-arrow-down"></i>查看更多</button>
                                </div>
                            <hr>
                            </div>
                            <hr>
                            <div class="row" id = "huifus">
                                <div class="col-md-6">
                                <form action="/lichengmi/index.php/Home/Article/replay/id/<?php echo ($articleInfo["id"]); ?>" method="post">
                                <div class="form-group"><label class="col-sm-2 control-label">楼层</label>

                                    <div class="col-sm-10" >
                                        <input type="text" value = "顶楼" disabled="" class="form-control" id = "replay">
                                    </div>
                                </div>
                                <input type="hidden" value = "" name = "replay" id = "huifuyincang">
                                <br><br>
                                <div class="form-group"><label class="col-sm-2 control-label">昵称</label>

                                    <div class="col-sm-10"><input class="form-control" type="text" placeholder = "请填写昵称" name = "name" required></div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group"><label class="col-sm-2 control-label" >邮箱</label>

                                    <div class="col-sm-10"><input class="form-control" type="email" placeholder = "请填写邮箱" name = "email" required></div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group"><label class="col-sm-2 control-label" >内容</label>

                                    <div class="col-sm-10">
                                        <textarea name="content" id="" cols="30" rows="5" placeholder = "请填写内容" required></textarea>
                                    </div>
                                </div>

                                    <center><button type="submit" class="btn btn-w-m btn-warning" style="margin-top:10px;">提交回复</button></center>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <i class="fa fa-info-circle"></i>回复规则
                                        </div>
                                        <div class="panel-body">
                                            <ul>
                                                <li>请勿发表辱骂，人身攻击等内容（否则封IP）</li>
                                                <li>本站不设验证码，所以也请注意不要刷屏</li>
                                                <li>可以讨论技术，但是对喷就没意思了</li>
                                                <li>文章哪里让你不爽，你可以指出来，不要上来就开喷</li>
                                                <li>发外链，发广告的，后果自己负责</li>
                                                <li>这里是一个干净，和谐的环境</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                        <div class="widget-head-color-box navy-bg p-lg text-center" style="margin-top:0px;">
                            <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                <?php echo ($userInfo["truename"]); ?>
                            </h2>
                                <small>注册会员</small>
                            </div>
                            <img src="/lichengmi/Public/Uploads/<?php echo ($userInfo["pic"]); ?>" class="img-circle circle-border m-b-md" alt="profile" height="150px;">
                        </div>
                        <div class="widget-text-box">
                            <p><span class="label label-success"  style="font-size:12px;">发布时间：<?php echo (date('Y-m-d H:i:s',$articleInfo["ctime"])); ?></span></p>
                            <p><span class="label label-success"  style="font-size:12px;">修改时间：<?php echo (date('Y-m-d H:i:s',$articleInfo["edittime"])); ?></span></p>
                            <p><span class="label label-success"  style="font-size:12px;">查看次数：<?php echo ($articleInfo["view"]); ?></span></p>
                            <p><span class="label label-success"  style="font-size:12px;">评论次数：<?php echo ($articleInfo["comment"]); ?></span></p>
                        </div>
                        <div class="widget lazur-bg p-xl">
                                <h2>
                                   TA的文章总数
                                </h2>
                               <center> <h1><?php echo ($articleCount); ?></h1></center>
                                <a href="/lichengmi/index.php/Home/Blog/index/id/<?php echo ($userInfo["id"]); ?>" target="_blank"><center><button type="button" class="btn btn-w-m btn-danger">查看他的主页</button></center></a>
                    </div>
                    <div class="widget yellow-bg p-lg text-left" style="padding-left:5px;padding-right:5px;">
                    <center><h2>TA的最新文章</h2></center>
                        <ul class="todo-list m-t ui-sortable" style="color:#000;">
                        <?php if(is_array($zuixin)): foreach($zuixin as $key=>$vo): ?><li>
                            <span class="m-l-xs"><a href="/lichengmi/index.php/Home/Article/index/id/<?php echo ($vo["id"]); ?>"><?php echo (msubstr($vo["title"],0,10,'utf-8',true)); ?></a></span>
                        </li><?php endforeach; endif; ?>
                    </ul>
                    </div>
                        <div class="widget red-bg p-lg text-center" style="padding:10px;">
                        <div class="m-b-md" style="margin-bottom:15px;">
                        <i class="fa fa-bell fa-4x"></i>
                            <button type="button" class="btn btn-w-m btn-info" style="margin-top:15px;">给他私信（会员才可使用）</button>
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

<script>
function huifuss(a){
    $("#replay").val("回复"+a+"楼");
    $("#huifuyincang").val(a);
}
var num = 0;
var id = $("#id").val();
var userid = $("#userid").val();
var now = 0;
function replay(){
    $.ajax({
       type: "POST",
       url: "/lichengmi/index.php/Home/Article/getReplay",
       data: "id="+id+"&num="+num,
       success: function(msg){
         if(msg == 5){
            $("#show").html('<i class="fa fa-arrow-down"></i>没有更多内容了');
         }else{
            msg = eval(msg);
            for (var i in msg)
            {
                now ++;
                if(msg[i].replay !=0){
                    msg[i].content = "<span class = 'label label-info' style = 'font-size:12px;'>回复"+msg[i].replay+"楼:</span><br/><br>"+msg[i].content;
                }
                if(msg[i].pic ==null){
                    var pic = '/lichengmi/Public/Uploads/default.png';
                }else{
                    var pic = "/lichengmi/Public/Uploads/"+msg[i].pic;
                }
                if(msg[i].uid == userid){
                    var shenfen = '<a class="btn btn-xs btn-white" href = "#huifus"onclick="huifuss('+now+')"><i class="fa fa-heart"></i> 回复 </a> <a class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i> 楼主';
                }else{
                    var shenfen = '<a class="btn btn-xs btn-white" href = "#huifus" onclick="huifuss('+now+')"><i class="fa fa-heart"></i> 回复 </a> <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> 游客';
                }

                var tm = new Date(parseInt(msg[i].ctime) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");

                $("#pinglun").append('<div class="feed-element"><a href="#" class="pull-left"><img alt="image" class="img-circle" src="'+pic+'"></a><div class="media-body "><small class="pull-right" style ="font-size:12px;">'+now+'楼</small><strong style = "font-size:15px;">'+msg[i].name+'</strong><br><small class="text-muted">'+tm+'</small><div class="well" style = "font-size:14px;">'+msg[i].content+'</div><div class="pull-right">'+shenfen+'</a></div></div></div><hr />');
            }
            num = num+10;
         }
       }
    });
}
replay();
</script>
<?php if($fenleiInfo["type"] == 4): ?><link href="/lichengmi/Public/wenzixiaoguo/css/animate.css" rel="stylesheet">
                                <script src="/lichengmi/Public/wenzixiaoguo/js/jquery.lettering.js"></script>
                                <script src="/lichengmi/Public/wenzixiaoguo/js/jquery.textillate.js"></script>
                                <script>
                                        $(function () {
                                        $('.text2').textillate({
                                            initialDelay: 1000,     //设置动画开始时间
                                            in: { effect: 'flipInX' //设置动画名称
                                            }
                                        });
                                    })
                                        $("#beijing").css("background","#242424");
                                        $("#beijing").css("color","#fff");
                                        $("#beijing").css("padding","10px");
                                </script>
                                <style type="text/css">
                                .text1,.text2,.text3 {visibility:hidden;}
                                .text2 {font-family:microsoft yahei;font-size:14px;line-height:24px;text-shadow:0.1em 0.1em 0.1em rgba(0, 0, 0, 0.8)}
                                </style>
                            <?php else: endif; ?>