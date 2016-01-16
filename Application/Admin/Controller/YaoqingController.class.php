<?php
namespace Admin\Controller;
use Think\Controller;
class YaoqingController extends CommonController {
    public function index(){
            $m=M("code");
            $arr = $m->select();
            $this->assign("arr",$arr);
    	$this->display();
    }

    public function add(){
        $this->display();
    }

    public function doadd(){
        $m = M("code");
        $result = $m->add($m->create());
        if($result>0){
            $this->success("添加成功！");
        }else{
            $this->error("添加失败！");
        }
    }

    public function delete(){
        $m=M("code");
        $id = $_GET['id'];
        $result = $m->delete($id);
        if($result>0){
            $this->success("删除成功！");
        }else{
            $this->error("删除失败！");
        }
    }














}
