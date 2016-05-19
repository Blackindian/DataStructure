CREATE TABLE IF NOT EXISTS `video` ( 
  `id` int(32) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  `vname` varchar(255) NOT NULL UNIQUE COMMENT '统一编号的视频名字', 
  `vdesc` varchar(255) NOT NULL COMMENT '视频描述信息', 
  `vuser` varchar(255) NOT NULL COMMENT '上传者', 
  `vstatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0-未审阅,1-已审阅', 
  `vtime` int(32) NOT NULL COMMENT '上传时间'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8; 