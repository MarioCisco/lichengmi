<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	$this->display();
    }
    public  function checklogin(){
    	$username = $_POST['username'];
    	$password = md5($_POST['password']);
    	$kouling = $_POST['kouling'];
    	$M = M('jingli');
    	$result = $M->where("username='%s' AND password='%s' AND kouling='%s' AND status ='0'",$username,$password,$kouling)->find();
    	if($result){
    		$_SESSION['username'] = $result['username'];
    		$_SESSION['kouling'] = md5(md5($result['kouling']));
    		$this->success('登陆成功',U('Admin/Index/index'),3);
    	}else{
    		$this->error('登陆失败');
    	}
    }

    public  function logout(){
    	session(null);
    	$this->success('欢迎再来',U('Admin/Login/login'),3);
    }

}
