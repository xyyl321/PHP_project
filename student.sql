/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : student

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-08-07 11:29:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('24', '啦啦', '1', '15', '15478');
INSERT INTO `students` VALUES ('20', '赵伟', '0', '33', '1487574');
INSERT INTO `students` VALUES ('23', '赵玉洁', '1', '28', '1485');
INSERT INTO `students` VALUES ('14', '小明', '0', '14', '14562');
INSERT INTO `students` VALUES ('16', '小花', '1', '18', '184444');
INSERT INTO `students` VALUES ('17', '周小斌', '0', '18', '18888');
