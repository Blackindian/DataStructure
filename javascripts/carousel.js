/* carousel.js */ 
$(function(){
	var i = 0;
	/*clone img01*/ 
	var img_clone = $(".banner .img li").first().clone();
	$(".banner .img").append(img_clone);
	var size = $(".banner .img li").size();
	/* dynamic create li*/ 

	// for(var k = 0; k < size-1; k++ {
	// 	$(".banner .num").append("<li></li>");
	// }

	$(".banner .num li").first().addClass("actived");

	/* dot hover */ 
	$(".banner .num li").hover(function(){
		var index = $(this).index();
		$(".banner .img").stop().animate({left:-1021*index},500);
		// $(".banner .num li").eq(index).addClass("actived").siblings().removeClass("actived");
		$(this).addClass("actived").siblings().removeClass("actived");
	});
    /*left < */ 
	$(".banner .btn_l").click(function(){
		i++;
		if (i == size) {
			$(".banner .img").css({left:0});
			i = 1;
		}
		$(".banner .img").stop().animate({left:-1021*i},500);
		if (i == size-1) {
			$(".banner .num li").eq(0).addClass("actived").siblings().removeClass("actived");	
		}else{
			$(".banner .num li").eq(i).addClass("actived").siblings().removeClass("actived");
		}	
	});
	/*right >*/ 
	$(".banner .btn_r").click(function(){
		i--;
		if (i == -1) {
			$(".banner .img").css({left:-1021*(size-1)});
			i = size-2;
		}
		$(".banner .img").stop().animate({left:-1021*i},500);
		$(".banner .num li").eq(i).addClass("actived").siblings().removeClass("actived");
	});
	/* auto player*/ 
	var timer = setInterval(slip_l,3000);
	/* auto player restriction*/
	$(".banner").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(slip_l,3000);
	});

	// function
	function slip_l(){
		i++;
		if (i == size) {
			$(".banner .img").css({left:0});
			i = 1;
		}
		$(".banner .img").stop().animate({left:-1021*i},500);
		if (i == size-1) {
			$(".banner .num li").eq(0).addClass("actived").siblings().removeClass("actived");	
		}else{
			$(".banner .num li").eq(i).addClass("actived").siblings().removeClass("actived");
		}
			
	}
	function slip_r(){
		i--;
		if (i == -1) {
			$(".banner .img").css({left:-1021*(size-1)});
			i = size-2;
		}
		$(".banner .img").stop().animate({left:-1021*i},500);
		$(".banner .num li").eq(i).addClass("actived").siblings().removeClass("actived");
	}
});