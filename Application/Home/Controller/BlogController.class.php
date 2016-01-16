<?php
namespace Home\Controller;
use Think\Controller;
class BlogController extends BaseController {
    public function index(){
        $id = $_GET['id'];
        $m=M("user");
        $arr =$m->where("id = {$id}")->find();
        if($arr){
            $this->assign("arr",$arr);
            $mm =M("userinfo");
            $info = $mm->where("uid = {$id}")->find();
            $this ->assign("info",$info);
            $this->assign("userPic",$info['pic']);
            //查出有多少个标签
            $biaoqian = explode(",", $info['biaoqian']);
            $this->assign("biaoqian",$biaoqian);
            //查出个性签名
            $gexing = explode(",", $info['gexing']);;
            $this->assign("gexing",$gexing);
            //查询出我的最新文章
            $mmm = D("article");
            $zuixinArticle = $mmm->where("uid = {$id}")->relation("Fenlei")->order("id desc")->limit(3)->select();
            $this->assign("zuixinArticle",$zuixinArticle);
            // var_dump($zuixinArticle);
            $this->display();
        }else{
            $this->show("<center><h1>你迷路了</h1></center>");
        }
    }

    public function send(){
        $m=M("blogliuyan");
        $data = $m->create();
        $data['ctime'] = time();
        $data['ip']=$_SERVER["REMOTE_ADDR"];
        $data['uid']=$_GET['id'];
        $result = $m->add($data);
        if($result>0){
            $this->success("留言成功！");
        }else{
            $this->error("留言失败！");
        }
    }








}
