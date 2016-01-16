<?php
namespace Home\Controller;
use Think\Controller;
class UserlistController extends BaseController {
    public function index(){
        $m=D("user");
        $arr = $m->relation(true)->order("id desc")->select();
        $this->assign("arr",$arr);
        $this->display();
    }
}
