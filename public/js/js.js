function ss(){
	$(function(){
		$('#change_yanzhengma').click(function(){
			$(this).attr('src',Home_Url+'Common/verify'+'?id='+Math.random());
		});
	});
	
	$(function(){
		$('.register_center form input[name=name]').keyup(function(){
			$.ajax({
				url: Home_Url+"Index/change_username_repeat",
				data : {'val': $('.register_center form input[name=name]').val()},
				type : "POST",
				dataType: 'text',
				success : function(data) {
					if(data=='0'){
						$('.register_center form div .div1').html("用户名重复，请换个试试");
					}else {
						$('.register_center form div .div1').html("用户名可以用");
					}
				},
				error : function(data) {
					
				}
			});
		});
		$('.register_center form input[value=注册]').click(function(){
			if($('.register_center form input[name=name]').val()==''){
				//alert("用户名不能为空");
				$('.register_center form div .div1').html("用户名不能为空");
			}else if($('.register_center form input[name=password]').val()=='') {
				$('.register_center form div .div2').html("密码不能为空");
			}else if($('.register_center form input[name=password]').val()!=$('.register_center form input[name=password2]').val()){
				$('.register_center form div .div3').html("两次密码不一致");
			}else{
				$('.register_center form input[value=注册]').attr('type','submit');
			}
		});
		
	});
}

//异步加载内容
$(function(){
	
	$(document).ready(function(){
		var content="";
		var num=1;
		var content_fn = function(){
			for(var i=0;i<10;i++){
				$.ajax({	
					url: Home_Url+"Blog/select_data",
					data : {'num': i},
					type: "POST",  
					dataType:'json',
					success : function(data) {
						var obj=eval('('+data+')');
						content="<div><span class='span1'>来自："+obj.username+"</span>" +
								"<span class='span2'>"+obj.name+"</span>" +
								"<span class='span3'>"+obj.time+"</span><p>"+obj.describe+"</p>" +
								"<span class='center_comment'>评论</span>" +
								"</div>" +
								"<span class='comment_inner'>" +
									"<form method='post' action='{:U('Blog/send_comment')}'>" +
									"<input type='text' name='comment'><input class='comment_add' type='button' value='评论'>" +
								"</form></span>";
						$('.center_center').append(content);
					},
					error : function(data) {
					}
				});
				
			}
		}
		content_fn();
	});
	setInterval(function(){
		$('.center_center div').remove(".loadClass");
	},2000);
	$(window).scroll(function(){
		if($(document).scrollTop()<=$(document).height()-$(window).height()){
			var content="<div class='loadClass'>正在加载...</div>";
			
			var content_fn = function(length){
				for(var i=0;i<10;i++){
					$.ajax({	
						url: Home_Url+"Blog/select_data",
						data : {'num': (length++)-1},
						type: "POST",  
						dataType:'json',
						success : function(data) {
							var obj=eval('('+data+')');
							content="<div><span class='span1'>来自："+obj.username+"</span>" +
								"<span class='span2'>"+obj.name+"</span>" +
								"<span class='span3'>"+obj.time+"</span><p>"+obj.describe+"</p>" +
								"<span class='center_comment'>评论</span>" +
								"</div>" +
								"<span class='comment_inner'>" +
								"<form>" +
								"<input type='text' name='comment'><input class='comment_add' type='button' value='评论'>" +
								"</form></span>";
							$('.center_center').append(content);
						},
						error : function(data) {
						}
					});
				}
			}
			if($('.center_center div:last').text()!="正在加载..."){
				$('.center_center').append(content);
			}else if($('.center_center div:last').text()=="正在加载..."){
			//	alert($('.center_center div').length);
				$('.center_center div:last').remove();
			//	alert($('.center_center div').length);
				var length =$('.center_center div').length;
				content_fn(length);
			}
			
		}
	});	
	
	//左边栏
	$('.center_left div').mouseover(function(){
		$(this).css({background:'#62A4D4',color:'white'});
	}).mouseout(function(){
		$(this).css({background:'',color:''});
	});
	
	//comment
	$('.center_center').click(function(e){
		if(e.target.className=='center_comment'){
			$(e.target).parent().next().toggle(function (){},function (){});
		}
	});
	
	$('.center_center').click(function(e){
		if(e.target.className=='comment_add'){
			var toUser = $(e.target).parent().parent().prev().children()[0].innerHTML;;
	//		alert($(e.target).parent().serialize()+"&toUser="+toUser);
			$.ajax({	
				url: Home_Url+"Blog/send_comment",
				data : $(e.target).parent().serialize()+"&toUser="+toUser,
				type: "POST",  
				dataType:'text',
				success : function(data) {
					$(e.target).parent().parent().css('display','none');
					if(data==0){
						alert("登录后评论...");
					}else {
						alert("评论成功...");
					}
				},
				error : function(data) {
					$(e.target).parent().parent().css('display','none');
				}
			});
		}
	});
});
