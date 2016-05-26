CREATE TABLE IF NOT EXISTS `admin` ( 
  `id` int(32) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  `sname` varchar(255) NOT NULL UNIQUE COMMENT '用户名', 
  `srole` varchar(255) NOT NULL  COMMENT '角色', 
  `srights` varchar(255) NOT NULL COMMENT '权限',  
  `addtime` int(32) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8; 


 
INSERT INTO admin (sname,srole,srights,addtime) VALUES ('xgqfrms2016','user','read',20160523);
INSERT INTO admin (sname,srole,srights,addtime) VALUES ('test','user','read&write',20160523);

