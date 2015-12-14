define(['jquery','ScrollTo'], function($,ScrollTo){
	function backTop(el,opts){
		this.opts = $.extend({},backTop.DEFULTS,opts);
		this.$el = $(el);
		this.scroll = new ScrollTo.scrollTo({
			dest: 0,
			speed: this.opts.speed
		});
		this._checkPosition();

		if(this.opts.mode == 'move'){
			this.$el.on('check',$.proxy(this._move,this));
		}else{
			this.$el.on('check',$.proxy(this._go,this));
		}
		$(window).on('scroll',$.proxy(this._checkPosition,this));	
	};
	//
	backTop.DEFULTS = {
		mode: 'move',
		pos: $(window).height(),
		speed: 800
	};
	backTop.prototype._move = function(){
		this.scroll.move();
	};
	backTop.prototype._go = function(){
		this.scroll.go();
	};
	backTop.prototype._checkPosition = function(){
		if($(window).scrollTop() > this.opts.pos){
			this.$el.fadeIn();
		}else{
			this.$el.fadeOut();
		};
	};
	//jquery plug-ins
	$.fn.extend({
		backTop: function(){
			this.each(function({
				new backTop(this,opts);
			});
			return this;
		}
	});
	// 
	return {
		backTop: backTop
	}
});