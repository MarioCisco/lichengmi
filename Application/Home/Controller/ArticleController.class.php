<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends BaseController {
    public function index(){
        $id = $_GET['id'];
        $m=M("article");
        $articleInfo = $m->where("id = {$id}")->find();
        if($articleInfo){
            $mm=D("user");
            $m->where("id = {$id}")->setInc('view',1);
            $userInfo = $mm->where("id = {$articleInfo['uid']}")->relation(true)->find();
            $mmm=M("fenlei");
            $fenleiInfo = $mmm->where("id = {$articleInfo['fid']}")->find();
            $articleCount = $m->where("uid = {$userInfo['id']} AND status = 0")->count();
            $zuixin = $m->where("uid = {$userInfo['id']} AND status = 0")->limit(5)->order("id desc")->select();
            $this->assign("zuixin",$zuixin);
            $this->assign("articleCount",$articleCount);
            $this->assign("articleInfo",$articleInfo);
            $this->assign("userInfo",$userInfo);
            $this->assign("fenleiInfo",$fenleiInfo);
            $this->display();
        }else{
            $this->show("<center><h1>你迷路了</h1></center>");
        }

    }

    public function replay(){
        $aid = $_GET['id'];
        $m =M("comment");
        $data = $m->create();
        $data['aid'] = $aid;
        $data['ctime']=time();
        if($_SESSION['muser']!=null || $_SESSION['muser']!= ''){
            $data['uid'] = $_SESSION['mid'];
        }
        $result = $m->add($data);
        if($result>0){
            $mm = M("article");
            if(!$this->email_set['comment_set']){
                $m = M('email_type');
                $info= $m->find(1);
                $article= $mm->find($aid);
                $info['send_comment_content'] = $info['send_comment_content']."<br/>回复帖子标题：<a href = '".$_SERVER['HTTP_REFERER']."' target = '_blank'>{$article['title']}</a><br/>回复署名：{$_POST['name']}<br/>回复内容：{$_POST['content']}";
                $this->MySmtp($this->admin_email,$info['send_comment_title'],$info['send_comment_content']);
            }
            $this->success("回复成功！");
            $a=$mm->where("id = {$aid}")->setInc('Comment');
        }else{
            $this->error("回复失败！");
        }
    }

    public function getReplay(){
        $id  = intval($_POST['id']);
        $num = intval($_POST['num']);
        $m = D("comment");
        $arr = $m->where("aid = {$id}")->limit($num,10)->relation(true)->select();
        if(!empty($arr)){
            $this->ajaxReturn($arr);
        }else{
            echo 5;
            exit;
        }
    }





}
