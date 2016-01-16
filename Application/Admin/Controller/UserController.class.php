<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
            $m = M("user");
            $count      = $m->count();
            $Page       = new \Think\Page($count,10);
            $show       = $Page->show();// 分页显示输出
            $list = $m->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign("list",$list);
            $this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }

    public function delete(){
        $id = $_GET['id'];
        $m =M("user");
        $result = $m->where("id = {$id}")->setField('status',1);
        if($result>0){
            $this->success("成功！");
        }else{
            $this->error("失败！");
        }
    }

    public function xianshi(){
        $id = $_GET['id'];
        $m =M("user");
        $result = $m->where("id = {$id}")->setField('status',0);
        if($result>0){
            $this->success("成功！");
        }else{
            $this->error("失败！");
        }
    }

}
