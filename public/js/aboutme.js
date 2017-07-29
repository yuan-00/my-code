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
					url: Home_Url+"Blog/about_me",
					data : null,
					type: "POST",  
					dataType:'json',
					success : function(data) {
						var obj=eval('('+data+')');
						for(var i=0;i<obj.length;i++){
							content="<div><span class='span1'>来自："+obj[i].fromUser+"</span>" +
							"<span class='span2'>评论我</span>" +
							"<span class='span3'>"+obj[i].time+"</span><p>"+obj[i].comment+"</p>" +
							"</div>";
							$('.center_center').append(content);
						}
					},
					error : function(data) {
					}
				});
				
			
		}
		content_fn();
	});
	
	
	//左边栏
	$('.center_left div').mouseover(function(){
		$(this).css({background:'#62A4D4',color:'white'});
	}).mouseout(function(){
		$(this).css({background:'',color:''});
	});

});