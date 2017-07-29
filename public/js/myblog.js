/**
 * 
 */
//异步加载内容
$(function(){
	
	$(document).ready(function(){
		var content="";
		var num=1;
		var content_fn = function(){
			
				$.ajax({	
					url: Home_Url+"Blog/my_message",
					data : null,
					type: "POST",  
					dataType:'json',
					success : function(data) {
						var obj=eval('('+data+')');
						for(var i=0;i<obj.length;i++){
							content="<div><span class='span1'>来自："+obj[i].username+"</span>" +
								"<span class='span2'>"+obj[i].name+"</span>" +
								"<span class='span3'>"+obj[i].time+"</span><p>"+obj[i].describe+"</p>" +
								"<span class='center_comment'>评论</span>" +
								"</div>" +
								"<span class='comment_inner'>" +
								"<form>" +
								"<input type='text' name='comment'><input class='comment_add' type='button' value='评论'>" +
								"</form></span>";
							$('.center_center').append(content);
						}
					},
					error : function(data) {
					}
				});
				
			
		}
		content_fn();
	});
	
	$('.center_center').click(function(e){
		if(e.target.className=='comment_add'){
			var toUser = $(e.target).parent().parent().prev().children()[0].innerHTML;
			//alert($(e.target).parent().serialize()+"&toUser="+toUser);
			$.ajax({	
				url: Home_Url+"Blog/send_comment",
				data : $(e.target).parent().serialize()+"&toUser="+toUser,
				type: "POST",  
				dataType:'text',
				success : function(data) {
					$(e.target).parent().parent().css('display','none');
					if(data==0){
						alert("登录后评论...");
					}
				},
				error : function(data) {
					$(e.target).parent().parent().css('display','none');
				}
			});
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

});