<?php
namespace Home\Controller;
use Think\Controller;
class BlogController extends CommonController {
    public function index(){
        $this->init();
        
        $this->display();
    }
    public function select_data(){
        $num=I('post.num');
        $message = M("message"); // 实例化对象
  //      $condition['id'] = $num+1;
       $id =$num;
 //       $result =$message->where($condition)->select();
        $result = $message->query("select * from think_message order by id desc");
        $this->ajaxReturn (json_encode($result[$id]),'JSON');
    }
    public function send_message(){
        $name=session('name');
        
        $send_name=I('post.name');
        $describe=I('post.describe');
        
        $data['name']=$send_name;
        $data['describe']=$describe;
        
        if ($name){
            $data['username']=$name;
            $message_add=M('message');
            $vv=$message_add->add($data);
            if ($vv){
              redirect(cookie('this_url'));
            }
        }else {
            header('Content-type:text/html;Charset=UTF-8');
            redirect(U('Index/index'),2,'请登录,正在跳转至登陆页...');
        }
    }
    public function myblog(){
        $this->init();
        $this->display();
    }
    public function my_message(){
        $name=session('name');
        if ($name){
            $message = M("message"); // 实例化对象
            $result =$message->where("username='$name'")->select();
            $this->ajaxReturn (json_encode($result),'JSON');
        }else {
            header('Content-type:text/html;Charset=UTF-8');
            redirect(U('Index/index'),2,'请登录,正在跳转至登陆页...');
        }
    }
    public function send_comment() {
        $name=session('name');
        
        $toUser=I('post.toUser');
        $comment=I('post.comment');
        $fromUser =$name;
        if ($name){
            $condition = array(
                'toUser' => $toUser,
                'fromUser'=> $fromUser,
                'comment'=> $comment
            );
            $msg=M('comment')->add($condition);
            if ($msg){
                echo 1;
            }else {}//echo "kk";
        }else {
           echo 0;
       //echo "ggg";
        }
    }
    public function mycomment(){
        $this->init();
        $this->display();
    }
    public function my_comment_msg(){
        $name=session('name');
        if ($name){
            $message = M("comment"); // 实例化对象
            $result =$message->where("fromUser='$name'")->select();
            $this->ajaxReturn (json_encode($result),'JSON');
        }else {
            header('Content-type:text/html;Charset=UTF-8');
            redirect(U('Index/index'),2,'请登录,正在跳转至登陆页...');
        }
    }
    public function aboutme(){
        $this->init();
        $this->display();
    }
    public function about_me(){
        $name=session('name');
        if ($name){
            $message = M("comment"); // 实例化对象
            $result =$message->where("toUser='来自：$name'")->select();
            $this->ajaxReturn (json_encode($result),'JSON');
        }else {
            header('Content-type:text/html;Charset=UTF-8');
            redirect(U('Index/index'),2,'请登录,正在跳转至登陆页...');
        }
    }
    
    
    
    
    
    
    
    
}
?>