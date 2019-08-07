/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : studentsmanager

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-08-07 11:29:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `tel` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', '小明', '0', '21', '18435657456');
INSERT INTO `students` VALUES ('2', '小红', '1', '18', '14857521542');
INSERT INTO `students` VALUES ('3', '张三', '0', '44', '184562574586');
INSERT INTO `students` VALUES ('4', '李四', '0', '45', '18457562542');
INSERT INTO `students` VALUES ('5', '小花', '1', '22', '18475625145');
INSERT INTO `students` VALUES ('6', '姗姗', '1', '20', '15784585421');
INSERT INTO `students` VALUES ('7', '张超', '0', '30', '18457265241');
INSERT INTO `students` VALUES ('11', '小米', '1', '50', '184756254155');
