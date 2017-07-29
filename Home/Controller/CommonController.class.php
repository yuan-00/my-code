<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function init(){
		//判断是否登录
		$name=session('name');
        if($name){
            $user_num=0;
            $this->data = $name;
        }
        //记录前一页面地址
        $url =__ACTION__;
       cookie("this_url",$url,60*60*24);
       $uu=$_SERVER['REQUEST_URI'];
	}
	//验证码
	public function verify(){
//         import('ORG.Util.Image');
//         Image::buildImageVerify();
		ob_end_clean();
	    $Verify = new \Think\Verify();
	    $Verify->fontSize = 18;
	    $Verify->length   = 4;
	    $Verify->useNoise = false;
	    $Verify->codeSet = '0123456789';
	    $Verify->imageW = 130;
	    $Verify->imageH = 50;
	    //$Verify->expire = 600;
	    $Verify->entry();
    }
    //检测验证码
    public function verify_check($code){
        $verify = new \Think\Verify();
        if ($verify->check($code))return 1;
        else return 0;
    }
}
?>