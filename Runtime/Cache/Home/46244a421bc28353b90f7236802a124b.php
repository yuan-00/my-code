<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>园林社区</title>
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>index.css" />
<script type="text/javascript">var Home_Url = "<?php echo (HOME_URL); ?>";
 function href(){
	 window.location.href="<?php echo (HOME_URL); ?>Index/register";
}
</script>
</head>
<body>
<div class="top">欢迎！在此演绎你的网络人生<span>目前在线：0</span></div>
<?php if(empty($data)): ?><div class="login">
			<form action="<?php echo U('Index/login');?>" method="post" >
				<input type="text" placeholder="用户名" name="name" />
				<input type="password" placeholder="密码" name="password" />
				<input type="submit" value="登录" /></a> 
		 		<input type="button" value="注册" onclick="href()" />
				<a href="<?php echo U('Blog/index');?>">直接进入</a>
			</form>
	</div>
<?php else: ?>
	<div class="login">
	  	
			欢迎回来，<?php echo ($data); ?>&nbsp;！
			<a href="<?php echo U('Home/Blog/index');?>"><input type="button" value="点击进入" /></a> 
			<a href="<?php echo U('Home/Index/logout');?>"><input type="button" value="退出" /></a>
		
	</div><?php endif; ?>
	<div class="center border_radius">
		<p><b>青玉案·元夕<b></p>
		<p>东风夜放花千树，更吹落，星如雨。</p>
		<p>宝马雕车香满路。</p>
		<p>凤箫声动，玉壶光转，一夜鱼龙舞。</p>
		<p>蛾儿雪柳黄金缕，笑语盈盈暗香去。</p>
		<p>众里寻他千百度，蓦然回首，</p>
		<p>那人却在，灯火阑珊处。</p>
		<div class="index_righttop"><img src="<?php echo (IMG_URL); ?>top.jpg" /></div>
		<div class="index_leftbottom"><img src="<?php echo (IMG_URL); ?>left.jpg" /></div>
	</div>
	<div class="copyright"><p style="font-style:oblique;">copyright</p><p>yuan_00&nbsp;&nbsp;邮箱：yuan_yal_0@163.com</p></div>
	
	
	
	
	
	
	
	
	
</body>
</html>