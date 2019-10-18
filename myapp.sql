/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : myapp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-10-18 17:56:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for kh_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `kh_admin_user`;
CREATE TABLE `kh_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '',
  `last_login_ip` varchar(30) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `listorder` int(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态,0普通，1正常，-1删除',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`username`) USING BTREE,
  KEY `add_time` (`create_time`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of kh_admin_user
-- ----------------------------
INSERT INTO `kh_admin_user` VALUES ('1', 'admin', '8267018b05416927ea8bbcf99f51682b', '', '0', '0', '1', '0', '0');
INSERT INTO `kh_admin_user` VALUES ('2', 'admin1', '8267018b05416927ea8bbcf99f51682b', '', '0', '0', '1', '1571392470', '1571392470');
