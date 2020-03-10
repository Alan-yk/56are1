# Host: localhost  (Version: 5.5.53)
# Date: 2017-03-31 12:19:27
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "auth"
#

DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "auth"
#

/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;

#
# Structure for table "banlist"
#

DROP TABLE IF EXISTS `banlist`;
CREATE TABLE `banlist` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "banlist"
#

/*!40000 ALTER TABLE `banlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `banlist` ENABLE KEYS */;

#
# Structure for table "collection"
#

DROP TABLE IF EXISTS `collection`;
CREATE TABLE `collection` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `topic_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "collection"
#

/*!40000 ALTER TABLE `collection` DISABLE KEYS */;
/*!40000 ALTER TABLE `collection` ENABLE KEYS */;

#
# Structure for table "config"
#

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "config"
#

/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

#
# Structure for table "friends"
#

DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `friend_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "friends"
#

/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;

#
# Structure for table "msg"
#

DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "msg"
#

/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;

#
# Structure for table "post"
#

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) DEFAULT NULL COMMENT '帖子ID',
  `post_poster` int(11) DEFAULT NULL COMMENT '回复者ID',
  `post_time` int(1) DEFAULT NULL COMMENT 'post时间',
  `post_text` text COMMENT '回复内容',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "post"
#

/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,36,1,1490539899,'&lt;p&gt;hahha&lt;br/&gt;&lt;/p&gt;'),(2,36,1,1490624243,'&lt;p&gt;继续测试回复&lt;/p&gt;'),(3,28,NULL,1490624817,'&lt;p&gt;cesfasda&lt;/p&gt;'),(4,35,NULL,1490624888,'&lt;p&gt;测试发生的&lt;/p&gt;');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

#
# Structure for table "topic"
#

DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '帖子ID',
  `topic_title` varchar(255) DEFAULT NULL COMMENT '帖子标题',
  `topic_type` int(11) DEFAULT NULL,
  `topic_text` text COMMENT '帖子内容',
  `topic_time` int(11) DEFAULT NULL COMMENT '帖子发布时间',
  `topic_last_time` int(11) DEFAULT NULL COMMENT '最近一次修改的时间',
  `topic_reply` int(11) DEFAULT '0' COMMENT '帖子回复数',
  `topic_views` int(11) DEFAULT '0' COMMENT '帖子查看次数',
  `topic_poster` int(11) DEFAULT NULL COMMENT '帖子作者id',
  `topic_last_poster` int(11) DEFAULT NULL COMMENT '最后回复者ID',
  `topic_status` int(1) DEFAULT '0' COMMENT '帖子状态0正常 1完结 2锁定 3删除',
  `is_hot` int(1) DEFAULT '0' COMMENT '是否是热帖 1是0否',
  `is_good` int(1) DEFAULT '0' COMMENT '是否是精帖 0否1是',
  `new_guy` int(1) DEFAULT '0' COMMENT '新人贴 0否1是',
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

#
# Data for table "topic"
#

/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` VALUES (12,'测试',1,'&lt;p&gt;测试&lt;/p&gt;',1489589144,NULL,0,0,1,1,0,0,0,0),(13,'ceshi',1,'&lt;p&gt;dsadsadasfsdafasdd&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0040.gif&quot;/&gt;&lt;/p&gt;',1490239578,NULL,0,0,1,1,0,0,0,0),(14,'lalala',1,'&lt;p&gt;啦啦啦&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0025.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0060.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0084.gif&quot;/&gt;&lt;/p&gt;',1490246305,NULL,0,0,1,1,0,0,0,0),(15,'啦啦啦啦',1,'&lt;p&gt;静安丽舍；经典；拉萨角度看&lt;/p&gt;',1490248617,NULL,0,0,1,1,0,0,0,0),(16,'测试',1,'&lt;p&gt;啦啦啦啦啦&lt;img src=&quot;/ueditor/php/upload/image/20170323/1490248705124964.jpg&quot; title=&quot;1490248705124964.jpg&quot; alt=&quot;Penguins.jpg&quot;/&gt;&lt;/p&gt;',1490248708,NULL,0,0,1,1,0,0,0,0),(17,'测试返回',1,'&lt;p&gt;just 测试&lt;/p&gt;',1490248844,NULL,0,0,1,1,0,0,0,0),(18,'测试返回',1,'&lt;p&gt;just 测试&lt;/p&gt;',1490248851,NULL,0,0,1,1,0,0,0,0),(19,'测试',1,'&lt;p&gt;测试&lt;br/&gt;&lt;/p&gt;',1490248938,NULL,0,0,1,1,0,0,0,0),(20,'测试啦啦啦',1,'&lt;p&gt;测试一下啦啦啦&lt;/p&gt;',1490249031,NULL,0,0,1,1,0,0,0,0),(21,'大叔大叔的',1,'&lt;p&gt;四打五&lt;/p&gt;',1490249081,NULL,0,0,1,1,0,0,0,0),(22,'大叔大叔的',1,'&lt;p&gt;四打五&lt;/p&gt;',1490249255,NULL,0,0,1,1,0,0,0,0),(23,'大叔大叔的',1,'&lt;p&gt;四打五&lt;/p&gt;',1490249366,NULL,0,0,1,1,0,0,0,0),(24,'大叔大叔的',1,'&lt;p&gt;倒萨大师&lt;/p&gt;',1490249392,NULL,0,0,1,1,0,0,0,0),(25,'萨达萨达撒',1,'&lt;p&gt;倒萨倒萨&lt;/p&gt;',1490249415,NULL,0,0,1,1,0,0,0,0),(26,'测试',1,'&lt;p&gt;哈哈哈&lt;/p&gt;',1490249580,NULL,0,0,1,1,0,0,0,0),(27,'最后一次测试',1,'&lt;p&gt;真的&lt;/p&gt;',1490249620,NULL,0,0,1,1,0,0,0,0),(28,'',1,'',1490249651,NULL,0,0,1,1,0,0,0,0),(29,'ces',1,'&lt;p&gt;sdasd&lt;/p&gt;',1490250099,NULL,0,0,1,1,0,0,0,0),(30,'dsadasd',1,'&lt;p&gt;fdafsa&lt;/p&gt;',1490250254,NULL,0,0,1,1,0,0,0,0),(31,'csdadas',1,'&lt;p&gt;dsadawed&lt;/p&gt;',1490250278,NULL,0,0,1,1,0,0,0,0),(32,'dsadsad',1,'&lt;p&gt;sdadasd&lt;/p&gt;',1490251894,NULL,0,0,1,1,0,0,0,0),(33,'dfsadas',1,'&lt;p&gt;dsadasa&lt;/p&gt;',1490251920,NULL,0,0,1,1,0,0,0,0),(34,'倒萨倒萨',1,'&lt;p&gt;的撒地方撒&lt;/p&gt;',1490252092,NULL,0,0,1,1,0,0,0,0),(35,'大大说的',1,'&lt;p&gt;&amp;nbsp;仨仨撒旦法&lt;/p&gt;',1490252209,NULL,0,0,1,1,0,0,0,0),(36,'大叔大叔的',1,'&lt;p&gt;十大动物&lt;/p&gt;',1490252270,NULL,0,0,1,1,0,0,0,0),(37,'倒萨倒萨',1,'&lt;p&gt;侧扶手&lt;/p&gt;',1490252300,NULL,0,0,1,1,0,0,0,0);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

#
# Structure for table "topic_theme"
#

DROP TABLE IF EXISTS `topic_theme`;
CREATE TABLE `topic_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(255) DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "topic_theme"
#

/*!40000 ALTER TABLE `topic_theme` DISABLE KEYS */;
INSERT INTO `topic_theme` VALUES (1,'家乡美');
/*!40000 ALTER TABLE `topic_theme` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '用户密码',
  `user_email` varchar(30) DEFAULT NULL COMMENT '用户邮箱',
  `reg_time` varchar(20) DEFAULT NULL COMMENT '用户注册时间',
  `user_post` int(11) DEFAULT '0' COMMENT '用户回复数',
  `user_gender` int(1) DEFAULT '0' COMMENT '0保密 1男 2女',
  `user_topics` int(11) DEFAULT '0' COMMENT '用户帖子数',
  `user_coin` int(10) DEFAULT '0' COMMENT '用户金币数',
  `user_lang` varchar(20) DEFAULT 'zh-cn' COMMENT '用户默认语言',
  `user_nation` varchar(20) DEFAULT NULL COMMENT '用户民族',
  `school` varchar(255) DEFAULT NULL COMMENT '用户学校',
  `school_number` varchar(255) DEFAULT NULL COMMENT '用户学号',
  `school_password` varchar(255) DEFAULT NULL COMMENT '学号密码',
  `user_admin` int(1) DEFAULT '0' COMMENT '是否是管理员',
  `user_img` varchar(255) DEFAULT NULL COMMENT '用户头像地址',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','8669ef246023f50913f405ca719daeeb','253407587@qq.com','1264659335',0,1,0,0,'zh-cn',NULL,NULL,NULL,NULL,1,''),(4,'这是一个测试账号','8669ef246023f50913f405ca719daeeb','14563526@qq.com','1487939374',0,NULL,0,0,'zh-cn',NULL,NULL,NULL,NULL,0,NULL),(5,'featct','e47bbc4df9d878c6681f80050e7d9025','1020234394@163.com','1490626648',0,0,0,0,'zh-cn',NULL,NULL,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
