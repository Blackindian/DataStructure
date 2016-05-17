/*
 * Overview: PMD5 Script
 * Author: mittya
 */


$(function(){
	/*
	  加入收藏
	*/
	$('#collect').on('click', function() {
	  var sURL = 'http://pmd5.com';
	  var sTitle = 'MD5解密';
	  try {
		window.external.addFavorite(sURL, sTitle);
	  } catch(e) {
		try {
		  window.sidebar.addPanel(sTitle, sURL, "");
		} catch(e) {
		  alert("加入收藏失败，请使用Ctrl+D 或 Command+D 进行添加！");
		}
	  }
	  return false;
	});
	
	
/*
  Tab 切换 & 提示
*/
(function() {

  var tabs = $('#J-tabs');
  tabs.on('click', '.tab', function(e) {
    e.preventDefault();
    $(this).addClass('on').siblings().removeClass('on');
  });

  tabs.find('.info').hover(function(e) {
    tabs.find('span').hide();
    $(this).find('span').fadeIn();
  }, function() {
    $(this).find('span').hide();
  });
})();


/*
  注册 & 登录
*/
(function() {
	
	var linkLogin = $('.j-login');
	var linkReg = $('.j-reg');
	if(linkLogin){//// 如果存在登陆按钮   
		var html=['<div class="overlay" id="J-overlay">',
		'	<div class="box login" style="display: none;">',
		'		<div class="title"> <a class="close" href="/" title="关闭"><i class="iconfont">㑃</i></a> <span>登 录</span> </div>',
		'		<div class="main">',
		'			<form action="member/login.aspx?action=ajax" method="POST" id="formLogin" novalidate>',
		'				<input class="txt" type="email" placeholder="邮箱" required>',
		'				<input class="txt" type="password" placeholder="密码" required>',
		'				<button class="btn" type="submit">登录</button>',
		'				<a class="j-reg" href="/">注册</a>',
		'			</form>',
		'		</div>',
		'	</div>',
		'	<!--/ .login -->',
		'	<div class="box reg" style="display: block;">',
		'		<div class="title"> <a class="close" href="/" title="关闭"><i class="iconfont">㑃</i></a> <span>注 册</span> </div>',
		'		<div class="main">',
		'			<form action="member/reg.aspx?action=ajax" method="POST" id="formReg" novalidate>',
		'				<input class="txt" type="email" placeholder=" * 邮箱" pattern="" required>',
		'				<input class="txt" type="password" placeholder=" * 密码" required>',
		'				<input class="txt" type="mobile" name="mobile" placeholder="手机号">',
		'				<div class="yzm">',
		'					<input type="text" name="checkcode" placeholder="* 请输入右侧验证码"><img src="member/checkcode.aspx" align="点击刷新" onClick="this.reload()" />',
		'				</div>',
		'				<button class="btn" type="submit">注册</button>',
		'				<a class="j-login" href="/">登录</a>',
		'			</form>',
		'		</div>',
		'	</div>',
		'	<!--/ .reg --> </div>'].join("");
		$("body").append(html);
		/*
		  表单验证
		*/
		var overlay = $('#J-overlay');
		var linkLogin = $('.j-login');
		var linkReg = $('.j-reg');
		$('#formLogin').validator();
		$('#formReg').validator();
		$('#formReg').submit(function(e) {
			e.preventDefault();
			var sthis=$(this);
			sthis.siblings(".ajax_error").remove();
			$.get("/member/reg.aspx?action=ajax&uname="+$("input[type=email]",sthis).val()+"&pwd="+$("input[type=password]",sthis).val()+"&tel="+$("input[name=mobile]",sthis).val()+"&checkcode="+$("input[name=checkcode]",sthis).val(),function(e){
				var r;
				try{
				if(typeof e=="string")
					r=eval("("+e+")");	
					if(r.error==0){
						$(".user-info").html('<li class="logined">登录成功!<a href="member/login.aspx?action=logout">退出</a></li>');
						overlay.fadeOut(1000);
					}else{
						sthis.before("<div class=\"ajax_error\">"+r.msg+"</div>");
						setTimeout(function(){$("ajax_error").remove();},5000);
					}
				}
					catch(e){ alert("发生未知错误!请联系管理员!");}
			});
		});
		$('#formLogin').submit(function(e) {
			e.preventDefault();
			var sthis=$(this);
			sthis.siblings(".ajax_error").remove();
			$.get("/member/login.aspx?action=ajax&uname="+$("input[type=email]",sthis).val()+"&pwd="+$("input[type=password]",sthis).val()+"",function(e){
				var r;
				try{
				if(typeof e=="string")
					r=eval("("+e+")");	
					if(r.error==0){
						overlay.removeClass('on');
						$(".user-info").html('<li class="logined">登录成功!<a href="member/login.aspx?action=logout">退出</a></li>');
					}else{
						sthis.before("<div class=\"ajax_error\">"+r.msg+"</div>");
						setTimeout(function(){$("ajax_error").remove();},5000);
					}
				}
					catch(e){ alert("发生未知错误!请联系管理员!");}
			});
		});
	
		
		linkLogin.on('click', function(e) {
			e.preventDefault();
			overlay.addClass('on').find('.login').show().siblings().hide();
		});
		linkReg.on('click', function(e) {
			e.preventDefault();
			overlay.addClass('on').find('.reg').show().siblings().hide();
		});
		
		overlay.on('click', '.close', function(e) {
			e.preventDefault();
			overlay.removeClass('on');
		});
	}
	

	//  添加博客链接
	$("footer ul").eq(0).append('<li>|</li><li><a href="http://weibo.com/u/2540458470" target="_new">新浪微博</a></li><li>|</li><li><a href="http://t.qq.com/pmd5_com" target="_new">腾讯博客</a></li><li>|</li><li><a href="http://user.qzone.qq.com/86517368" target="_new">QQ空间</a></li><li>|</li><li>admin@pmd5.com</li>');
	// 添加破解次数  <p>MD5解密<em id="successcount"></em></p>
	$.get("/default.aspx?action=getcount",function(data){$("#successcount").html("成功"+data+"次");});
	/*  en 统计来源; en*/
	var referrer = document.referrer;
	if (referrer.length>5 && referrer.indexOf("pmd5.com") <= 0) {
	    $.get("/buding.aspx?referrer=" + document.referrer);
	}
	
	////提交表单时验证md5
	$("#formMd5").submit(function(e) {
		var v=$("#key").val();
		if(!v||v.length<1){
			$("#tip").addClass("error").html('<i class="iconfont">&#x3443;</i><p class="info">请输入MD5密文!<p>');
			return false;
		}
		if(!md5test(v))
		{
			$("#tip").addClass("error").html('<i class="iconfont">&#x3443;</i><p class="info">不是标准MD5值!<p>');
			return false;}
	});
	/////自动计算用户input输入的MD5值  
	$("#key").keyup(function(e) {
	  var v=this.value;
	  if(!v||v.length<1){
		  $("#tip").html('').removeClass("error");
		  return;
	  }
	  var s=md5(v);
	  $("#tip").removeClass("error").html("16位加密结果: "+s[0]+"<br/>32位加密结果: "+s[1]);
	  //return false;
	});
})();
	
});


////百度统计代码  
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F558277c2aafa11d5d6a6560f1c025aff' type='text/javascript'%3E%3C/script%3E"));
var timeleave = 30;
