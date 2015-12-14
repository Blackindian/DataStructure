define(['jquery'], function($){
	//
	scrollTo.DEFAULTS = {
		dest: 0,
		speed: 800
	};
	//
	function scrollTo(opts){
		this.opts = $.extend({},scrollTo.DEFAULTS,opts);
		this.$elX = $('html','body');
	};
	// 
	scrollTo.prototype.move = function() {
		//var
		var optsX = this.opts;
		var elX = this.$elX;

		//判断 move state!
		// if($(window).scrollTop() != optsX.dest){
		if($(window).scrollTop() != optsX.dest){
			if(!elX.is(':animated')){
				//测试animate执行次数
				console.log(1);
				elX.animate({
					scrollTop:optsX.dest
				},optsX.speed);
			}
		};

		elX.animate({
			scrollTo: optsX.dest
		},optsX.dest);
	};
	scrollTo.prototype.go = function() {
		//
		var optsY = this.opts;
		var elY = this.$elX;
		//判断 go state!
		if($(window).scrollTop() != optsY.dest){
			elY.scrollTop(optsY.dest);
		};

		elY.scrollTo(optsY.dest);
	};
	// 
	return {
		scrollTo: scrollTo
	};
});