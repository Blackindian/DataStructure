<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <!-- SEO : Search Engine Optimization  -->
        <meta name="keywords" content="DSQCW,Data Structure Quality Course Website">
        <meta name="description" content="DSQCW:Data Structure Quality Course Website. It is a free Website for anybody who wants to learn Data Structure!">
        <meta name="author" content="xgqfrms 2016">
        <meta name="generator" content="Sublime Text3 && WAMP || LAMP">
        <!-- 自动刷新 $ 重定向 --> 
        <meta http-equiv="refresh" content="60; url=https://xgqfrms.github.io/DataStructure/">
        <!-- Browser Compatiable -->
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
        <!--media query-->
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
        <link rel="stylesheet" type="text/css" href="css/demo.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <!-- icon -->
        <link rel="shortcut icon" href="../images/icon-me.jpg" type="image/x-icon">
        <title>DSQCW | Data Structure Quality Course</title>        
    </head>
    <body>
        <div class="container">
            <header>
                <h1>DSQCW<span>|Data Structure Quality Course Website</span></h1>
				<nav class="codrops-demos">
					<span><strong>DSQCW | 数据结构核心课程网站</strong></span>
				</nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="doAction.php?act=login" autocomplete="on" method="post"> 
                                <h1>登录账号</h1> 
                                <p> 
                                <label for="username" class="uname" data-icon="u" > 用户名： </label>
                                <input id="username" name="username" required="required" type="text" placeholder="xgqfrms"/>
                            </p>
                            <p> 
                                <label for="password" class="youpasswd" data-icon="p"> 密码： </label>
                                <input id="password" name="password" required="required" type="password" placeholder="************" /> 
                            </p>                        
                            <p>
                                <label for="captcha" class="youcaptcha" data-icon="p"> 验证码： </label>
                                <input id="captcha" name="captcha" required="required" type="text" placeholder="captcha" /> 
                                <div class="captcha">
                                    <!-- <img src="captcha.php?var"> -->
                                    <img id="captcha_img" class="captcha_img" src="captcha/php/dot.php?r=<?php echo rand();?>" />
                                    <!-- style="border:1px sloid red;width:100px ;height:30px" -->
                                    <span>
                                        <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='captcha/php/dot.php?r='+Math.random()">看不清，换一个！</a>
                                    </span><br>
                                    <!-- 前端regular expression验证 -->
                                </div>
                            </p>
                            <p class="keeplogin"> 
                                <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" checked="checked" /> 
                                <label for="loginkeeping">保持登录状态</label>
                            </p>
                            <p class="login button"> 
                                <input type="submit" value="登录" /> 
                            </p>
                            <p class="change_link">
                                没有账号?
                                <a href="#toregister" class="to_register">注册账号</a>
                            </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="doAction.php?act=reg" autocomplete="on" method="post"> 
                                <h1> 注册账号 </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u"> 用户名：</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="xgqfrms" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > 邮箱：</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="xgqfrms@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p"> 密码： </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="**********"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="注册账号"/> 
								</p>
                                <p class="change_link">  
									已有账号?
									<a href="#tologin" class="to_register">直接登录</a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>