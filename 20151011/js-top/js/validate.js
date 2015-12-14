// 自定义validate模块

// 引入jquery
define(['jquery'], function($){
	/**
	function isEmpty() {
		// body...
	};
	function checkLength() {

	};
	function isEqual() {

	};
	*/
	// return返回一个对象,使外面js可以访问该模块
	return{
		isEmpty: function(){
			return true;	
		},
		checkLength: function(){
			return true;
		},
		isEqual: function(str1,str2){
			return str1 == str2;
		}
	};	
});