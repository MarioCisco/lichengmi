<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    protected $email_set;
    protected $admin_email;
    public function _initialize(){
        $fenlei = M("fenlei");
        $fenleiListone = $fenlei->where("fid = 0")->select();
        $fenleiListtwo = $fenlei->where("fid != 0")->select();
        $this ->assign("fenleiListone",$fenleiListone);
        $this->assign("fenleiListtwo",$fenleiListtwo);
        $Site = M("site");
        $SiteInfo =$Site->find(1);
        $this->SiteInfo = $SiteInfo;
        $this->assign("SiteInfo",$SiteInfo);
        /*查询邮件配置*/
        $emailModel = M("email_set");
        $email_set = $emailModel->find(1);
        $this->email_set = $email_set;
        /*设置管理员邮箱*/
        $this->admin_email = $SiteInfo['admin_email'];
    }

    /*发送邮件方法*/
    protected function MySmtp($smtpemailto,$mailtitle,$mailcontent){
        $email = new \Org\Util\Smtp();
        $email->smtp($this->email_set['smtpserver'],$this->email_set['smtpserverport'],true,$this->email_set['smtpuser'],$this->email_set['smtppass']);
        $email->debug = false;//是否显示发送的调试信息
        $state = $email->sendmail($smtpemailto,$this->email_set['smtpusermail'], $mailtitle, $mailcontent,"HTML");
    }

}
