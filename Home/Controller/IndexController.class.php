<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->init();
        $this->display();
    }
    public function login(){
        //    	if(!$this->isPost()){
        //       		 halt('页面不存在');
        //		}
        $name=I('post.name');
        $password=I('post.password');
        $condition = array(
            'name' => $name,
            'password'=> $password
        );
        $user=M('user')->where($condition)->find();
        if($user){
            $name=$user['name'];
            if($user['password']){
                $password=$user['password'];
            }
            session('name',$name);
            session('password',$password);
    
            header('Content-type:text/html;Charset=UTF-8');
            redirect(cookie('this_url'));
        }else{
            header('Content-type:text/html;Charset=UTF-8');
            redirect(U('index'),2,'用户名或密码错误,正在跳转回登陆页...');
        }
    }
    public function logout(){
        session('name',null);
        session('password',null);
        redirect(cookie('this_url'));
    }
    
    public function insert(){
        $name=I('post.name');
        $password=I('post.password');
        $password2=I('post.password2');
        $yanzhengma=I('post.yanzhengma');
        if (!$this->verify_check($yanzhengma)){
            header('Content-type:text/html;Charset=UTF-8');
            redirect(HOME_URL."Index/register.html",2,'验证码错误');
        }else {
            $data['name']=$name;
            $data['password']=$password;
            $user_add=M('user');
            $vv=$user_add->add($data);
            if ($vv){
                header('Content-type:text/html;Charset=UTF-8');
                session('name',$name);
                session('password',$password);
                redirect(U('Index/index'),2,'注册成功，正在登陆...');
            }else {
                header('Content-type:text/html;Charset=UTF-8');
                echo "注册失败";
            }
        }
    }
    public function register(){
        $this->display();
        
    }
    public function change_username_repeat(){
        $val=I('post.val');
        $condition = array(
            'name' => $val,
        );
        $true_val=M('user')->where($condition)->find();
        if ($true_val){
            echo 0;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>