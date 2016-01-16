<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        if($_SESSION['muser']==null || $_SESSION['muser']== ''){
            $this->error("非法操作",U('Index/index'));
        }
        $this->display();
    }

    public function reg(){
        $m=M("user");
        $code = $_POST['code'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['truename'];
        $codem = M("code");
        if($this->SiteInfo['userstatus'] ==1){
            $codeCheck = $codem->where("code = '{$code}' AND status = 0")->find();
        }else{
            $codeCheck = 1;
        }
        if($codeCheck>0){
            $emailCheck = $m->where("email = '{$email}'")->find();
            $nameCheck = $m->where("truename = '{$name}'")->find();
            if($emailCheck || $email == '' || $password == '' || $nameCheck){
                $this->error("邮箱，昵称不正确或者已经注册！");
            }else{
                $data = $m->create();
                unset($data['code']);
                $data['ip']=$_SERVER["REMOTE_ADDR"];
                $data['ctime']=time();
                $data['password']=md5($password);
                $result = $m->add($data);
                if($result>0){
                    if($this->SiteInfo['userstatus'] ==1){
                        $codeData['status'] =1;
                        $codeData['user']=$email;
                        $codem->where("code = '{$code}'")->save($codeData);
                    }
                    $users = M("userinfo");
                    $usersdata['uid']=$result;
                    $usersdata['pic']='default.png';
                    $users->add($usersdata);
                    // 用户是否收到邮件
                    if(!$this->email_set['reg_set_user']){
                        $m = M('email_type');
                        $info= $m->find(1);
                        $this->MySmtp($email,$info['reg_user_title'],$info['reg_user_content']);
                    }
                    // 管理员是否收到邮件
                    if(!$this->email_set['reg_set_admin']){
                        $m = M('email_type');
                        $info= $m->find(1);
                        $info['reg_admin_content'] = $info['reg_admin_content']."<br/>用户邮箱：{$email}<br/>用户昵称：{$name}<br/>注册IP：{$data['ip']}";
                        $this->MySmtp($this->admin_email,$info['reg_admin_title'],$info['reg_admin_content']);
                    }
                    $this->success("注册成功，回去登陆");
                }else{
                    $this->error("注册失败，我也不知道为什么");
                }
            }
        }else{
            $this->error("邀请码不正确！");
        }
    }


    public function login(){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $m=M("user");
        $result = $m->where("email = '{$email}' AND password = '{$password}' AND status = 0")->find();
        if($result>0){
            $this->success("登陆成功！");
            $_SESSION['muser']=$result['truename'];
            $_SESSION['mid']=$result['id'];
            $_SESSION['mlasttime']=$result['lasttime'];
            $m->where("id = {$result['id']}")->setField('lasttime',time());
            $_SESSION['mlastip']=$result['ip'];
            $m->where("id = {$result['id']}")->setField('ip',$_SERVER["REMOTE_ADDR"]);
        }else{
            $this->error("登陆失败！");
        }
    }

    public function logout(){
        $_SESSION['muser']=null;
        $this->success("退出成功！");
    }

    public function addArticle(){
        if($_SESSION['muser']==null || $_SESSION['muser']== ''){
            $this->error("非法操作",U('Index/index'));
        }else{
            $m=M("fenlei");
            $arr = $m->where("fid != 0")->select();
            // $arr2 = $m->where("fid != 0")->select();
            $this->assign("arr",$arr);
            // $this->assign("arr2",$arr2);
            $this->display();
        }

    }

    public function doAddArticle(){

        if($_SESSION['muser']==null || $_SESSION['muser']== ''){
            $this->error("非法操作",U('Index/index'));
        }else{
            $m=M("article");
            $data = $m->create();
            $data['uid']= $_SESSION['mid'];
            $data['ctime']=time();
            $data['edittime']=time();
            $data['view']=1;
            if($this->SiteInfo['articlesatus'] ==1){
                $data['status']=1;
            }else{
                $data['status']=0;
            }
            $data['content'] = $_POST['content'];
            //判断文章类型
            $mm = M("fenlei");
            $fidInfo = $mm->where("id={$data['fid']}")->find();
            if($fidInfo['type']==2){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     20971520 ;// 设置附件上传大小
                $upload->exts      =     array('mp3', 'wam', 'wma', 'aac','mod','cd');// 设置附件上传类型
                $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件
                $info   =   $upload->uploadOne($_FILES['mp3']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{
                    $data['mp3']=$info['savepath'].$info['savename'];
                }
            }elseif ($fidInfo['type']==4) {
                //原来是两张图片，现在取消了
            }
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件
                $info   =   $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功
                    $data['pic']=$info['savepath'].$info['savename'];

                    $result = $m->add($data);
                    if($result>0){
                        if(!$this->email_set['send_article_set']){
                            $m = M('email_type');
                            $info= $m->find(1);
                            $url = "http://".$_SERVER['SERVER_NAME'].__MODULE__."/Article/index/id/".$result;
                            $info['send_article_content'] = $info['send_article_content']."<br/>发表文章标题：<a href = '".$url."' target = '_blank'>{$_POST['title']}</a>";
                            $this->MySmtp($this->admin_email,$info['send_article_title'],$info['send_article_content']);
                        }
                        $this->success("发布成功！");
                    }else{
                        $this->error("发布失败！");
                    }
                }
            }
        }

        public function userInfo(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $m=M("user");
            $userid = $_SESSION['mid'];
            $userInfo = $m->where("id={$userid}")->find();
            $this->assign("userInfo",$userInfo);
            $mm =M("userinfo");
            $userPic = $mm->where("uid={$userid}")->find();
            $this->assign("userPic",$userPic['pic']);
            $this->display();
        }

        public function changePass(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $one = $_POST['passone'];
            $two = $_POST['passtwo'];
            if($one != $two || $one == '' || $two == ''){
                $this->error("对不起，两次密码不一致");
            }else{
                $m=M("user");
                $id = $_SESSION['mid'];
                $pass = md5($one);
                $result = $m->where("id={$id}")->setField('password',$pass);
                if($result>0){
                    $this->success("修改成功!");
                }else{
                    $this->error("修改失败！");
                }
            }
        }

        public function detail(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $id = $_SESSION['mid'];
            $m = M("userinfo");
            $arr = $m->where("uid = {$id}")->find();
            $this->assign("arr",$arr);
            $this->display();
        }


        public function saveDetail(){
            $id = $_SESSION['mid'];
            $m=M("userinfo");
            $result=$m->where("uid = {$id}")->save($m->create());
            if($result>0){
                $this->success("更新成功！");
            }else{
                $this->error("更新失败！");
            }
        }


        public function liuyan(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $id = $_SESSION['mid'];
            $m=M("blogliuyan");
            $arr = $m->where("uid = {$id}")->select();
            $this->assign("arr",$arr);
            $this->display();
        }

        public function gonggao(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $m = M("gonggao");
            $arr = $m->select();
            $this->assign("arr",$arr);
            $this->display();
        }

        public function myArticle(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $uid = $_SESSION['mid'];
            $m = M("article");
            $count      = $m->where("uid = {$uid} AND status = 0")->count();//
            $Page       = new \Think\Page($count,10);//
            $show       = $Page->show();//
            $articleList = $m->where("uid = {$uid} AND status = 0")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('page',$show);// 赋值分页输出
            $this->assign("articleList",$articleList);
            $this->display();
        }


        public function delArticle(){
            if($_SESSION['muser']==null || $_SESSION['muser']== ''){
                $this->error("非法操作",U('Index/index'));
            }
            $uid = $_SESSION['mid'];
            $id = $_GET['id'];
            $m = M("article");
            $articleInfo= $m->where("id = {$id}")->find();
            if($articleInfo['uid'] != $uid){
                $this->error("非法操作",U('Index/index'));
            }else{
                $result = $m->where("id = {$id}")->setField('status',1);
                if($result>0){
                    $this->success("删除成功！");
                }else{
                    $this->error("删除失败！");
                }
            }
        }












        }
