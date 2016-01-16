<?php
namespace Admin\Controller;
use Think\Controller;
class GonggaoController extends CommonController {
    public function index(){
            $m=M("gonggao");
            $arr = $m->order("id desc")->select();
            $this->assign("arr",$arr);
    	$this->display();
    }

    public function add(){
        $this->display();
    }

    public function doadd(){
        $m = M("gonggao");
        $data = $m->create();
        $data['ctime']=time();
        $result = $m->add($data);
        if($result>0){
            $this->success("添加成功！");
        }else{
            $this->error("添加失败！");
        }
    }

    public function delete(){
        $m=M("gonggao");
        $id = $_GET['id'];
        $result = $m->delete($id);
        if($result>0){
            $this->success("删除成功！");
        }else{
            $this->error("删除失败！");
        }
    }


    public function edit(){
        $id = $_GET['id'];
        $m=M("gonggao");
        $arr = $m->where("id = {$id}")->find();
        $this->assign("arr",$arr);
        $this->display();
    }

    public function doedit(){
        $id = $_GET['id'];
        $m = M("gonggao");
        $result = $m->where("id = {$id}")->save($m->create());
        if($result>0){
            $this->success("修改成功！");
        }else{
            $this->error("修改失败！");
        }
    }













}
