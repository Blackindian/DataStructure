requirejs.config({
	paths:{
		// 定义模块别名
		jquery: 'jquery-2.1.4.min'
	}
});
//别名,引入模块  $=jquery
requirejs(['jquery'], function($){
	// test
	$('body').css('background-color','green');
	// $('#backTop').on('click',move);//移动到top
	$('#backTop').on('click',go);//直接返回top
	$(window).on('scroll', function(){
		checkPosition($(window).height());
	});

	// refresh check
	checkPosition(pos);

	function move(){
		$('html','body').animate({
			scrollTop:0  //; ?
		},800);
	}

	function go(){
		$('html','body').scrollTop(0);
	}

	function checkPosition(pos){
		if(($window).scrollTop() > pos){
			$('#backTop').fadeIn();
		}else{
			$('#backTop').fadeOut();
		}
	}
});
//引入多个模块 ['jquery','validate']
// ? 如何自定义，全局变量 #=validate ？
requirejs(['jquery','validate'], function($,validate){
	console.log(validate.isEqual(123,456));
	console.log(validate.isEqual(123,123));
});

//ScrollTo.js
requirejs(['jquery','ScrollTo'], function($,ScrollTo){
	//new object
	var scrollX = new ScrollTo.scrollTo({
		// move ,go parameter
		dest: 0,
		speed: 800
		// dest: 500,
		// speed: 800
	});

	
	// $.proxy(scrollX.move,scrollX)|***fix***|this-error
	$('#backTop').on('click',$.proxy(scrollX.move,scrollX));//移动到top
	// $('#backTop').on('click',scrollX.move);//移动到top
	// ?不需要 $proxy ?
	$('#backTop').on('click',$.proxy(scrollX.go,scrollX));//直接返回top
	// $('#backTop').on('click',scrollX.go);//直接返回top
	});
	//
});

