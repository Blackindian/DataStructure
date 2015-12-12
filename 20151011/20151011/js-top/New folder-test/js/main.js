requirejs.config({
	paths:{
		// 定义模块别名
		jquery: 'jquery-2.1.4.min'
	}
});
//别名,引入模块  $=jquery
requirejs(['jquery'], function($){
	// test
	$('body').css('background-color','red');
/*
	function isEmpty() {
		// body...
	};
*/
});
//引入多个模块 ['jquery','validate']
// ? 如何自定义，全局变量 #=validate ？
requirejs(['jquery','validate'], function($,validate){
	console.log(validate.isEqual(123,456));
	console.log(validate.isEqual(123,123));
});