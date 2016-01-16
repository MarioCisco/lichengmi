<?php
namespace Admin\Controller;
use Think\Controller;
class SlidesController extends CommonController {
    public function index(){
            $m=M("slides");
            $arr = $m->order("id desc")->select();
            $this->assign("arr",$arr);
    	$this->display();
    }

    public function add(){
        $this->display();
    }

    public function doadd(){
        $m = M("slides");
        $data = $m->create();
        $data['ctime']=time();
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
                $this->success("发布成功！");
            }else{
                $this->error("发布失败！");
        }
    }
}
    public function delete(){
        $m=M("slides");
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
        $m=M("slides");
        $arr = $m->where("id = {$id}")->find();
        $this->assign("arr",$arr);
        $this->display();
    }

    public function doedit(){
        $id = $_GET['id'];
        $m = M("slides");
        $data = $m->create();
        if(empty($_FILES['pic']['name'])){
            unset($data['pic']);
        }else{
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件
            $info   =   $upload->uploadOne($_FILES['pic']);
            if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
            }else{// 上传成功
                $data['pic']=$info['savepath'].$info['savename'];
            }
        }
        $result = $m->where("id = {$id}")->save($data);
        if($result>0){
            $this->success("修改成功！");
        }else{
            $this->error("修改失败！");
        }
    }













}
