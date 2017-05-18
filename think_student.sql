/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-18 17:46:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `think_student`
-- ----------------------------
DROP TABLE IF EXISTS `think_student`;
CREATE TABLE `think_student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `fileteacherid` int(10) DEFAULT NULL,
  `introduceid` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dataofbirth` date DEFAULT NULL,
  `fixedline` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `registered` varchar(255) DEFAULT NULL,
  `infotype` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `graduatedate` date DEFAULT NULL,
  `studyabroad` varchar(255) DEFAULT NULL,
  `abroaddate` date DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `sat1` varchar(255) DEFAULT NULL,
  `sat1date` date DEFAULT NULL,
  `sat2` varchar(255) DEFAULT NULL,
  `sat2date` date DEFAULT NULL,
  `toefl` varchar(255) DEFAULT NULL,
  `toefldate` date DEFAULT NULL,
  `telts` varchar(255) DEFAULT NULL,
  `teltsdate` date DEFAULT NULL,
  `gmat` varchar(255) DEFAULT NULL,
  `gmatdate` date DEFAULT NULL,
  `grt` varchar(255) DEFAULT NULL,
  `grtdate` date DEFAULT NULL,
  `lsat` varchar(255) DEFAULT NULL,
  `lsatdate` date DEFAULT NULL,
  `state` int(10) DEFAULT '1',
  `addtime` int(30) DEFAULT NULL,
  `updatetime` int(30) DEFAULT NULL,
  `fileteacher` varchar(255) DEFAULT NULL,
  `lastcomment` int(30) DEFAULT NULL,
  `checkinfo` int(10) DEFAULT '0',
  `qq` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_student
-- ----------------------------
INSERT INTO `think_student` VALUES ('2', null, '0', 'bb1111', '男', '0000-00-00', '', 'bb', '', '来电', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '3', '1494473538', null, '无', '1494572062', null, null);
INSERT INTO `think_student` VALUES ('3', null, '0', 'av', '男', '0000-00-00', '', 'ab', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0', '1494476455', null, '无', '1494476455', null, null);
INSERT INTO `think_student` VALUES ('4', null, '0', '孙可', '男', '0000-00-00', '', '13419631030', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0', '1494571557', null, '无', '1494571586', null, null);
INSERT INTO `think_student` VALUES ('5', null, '0', '马思晗', '女', '0000-00-00', '15927489086', '15927489086', '上海', '', '武汉大学', '本科', '计算机', 'xymsh@outlook.com', '2018-06-30', '美国', '0000-00-00', '5', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0', '1494572404', null, 'Army', '1494573133', null, null);
INSERT INTO `think_student` VALUES ('6', null, '0', '王同学', '男', '0000-00-00', '', '15927621828', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494572979', null, '无', '1494572979', null, null);
INSERT INTO `think_student` VALUES ('7', null, '0', '张三', '男', '0000-00-00', '', '15827043100', '', '', '', '本科', '金融', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '总分6小分5.5', '2017-05-13', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494573290', null, '无', '1494573311', null, null);
INSERT INTO `think_student` VALUES ('8', null, '0', '杨同学', '男', '0000-00-00', '', '18553635868', '', '1234569', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494573582', null, '无', '1494573582', null, null);
INSERT INTO `think_student` VALUES ('9', null, '0', '12', '男', '0000-00-00', '12345678911', '12345678911', '', '托福123', '武大', '本科', 'cs', '', '0000-00-00', '美国', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494573688', null, '无', '1494573688', null, null);
INSERT INTO `think_student` VALUES ('10', null, '0', '李四', '男', '0000-00-00', '', '13254678912', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '3', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494573767', null, '无', '1491573767', null, null);
INSERT INTO `think_student` VALUES ('11', null, '0', '123', '男', '0000-00-00', '', '12345678912', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494573935', null, '无', '1494573935', null, null);
INSERT INTO `think_student` VALUES ('12', null, '0', '张二', '男', '0000-00-00', '', '1587043100', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494574074', null, '无', '1494574074', null, null);
INSERT INTO `think_student` VALUES ('13', null, '0', '1234', '男', '0000-00-00', '', '123456,123456', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494574163', null, '无', '1494574163', null, null);
INSERT INTO `think_student` VALUES ('14', null, '0', '1234567', '男', '0000-00-00', '', '12345678911,123456', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494574189', null, '无', '1494574189', null, null);
INSERT INTO `think_student` VALUES ('15', null, '0', '1221', '男', '0000-00-00', '', '123', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494574733', null, '无', '1494574733', null, null);
INSERT INTO `think_student` VALUES ('16', null, '0', '招二', '男', '0000-00-00', '', '1587645635', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494575289', null, '无', '1494575289', null, null);
INSERT INTO `think_student` VALUES ('17', null, '0', '21', '男', '0000-00-00', '123', '213', '', '1234567891234567891234333333', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494575895', null, '无', '1494575895', null, null);
INSERT INTO `think_student` VALUES ('18', null, '0', '12213', '男', '0000-00-00', '123', '2131', '', 'T武大20170415张&amp;陈维', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494575961', null, '无', '1494575961', null, null);
INSERT INTO `think_student` VALUES ('19', null, '0', '孙莉', '男', '0000-00-00', '', '13037195184', '', '123456789', '华科', '本科', '会计', '', '2017-06-30', '', '2018-09-01', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494576257', null, '无', '1494576629', null, null);
INSERT INTO `think_student` VALUES ('20', null, '0', '王王', '男', '0000-00-00', '', '132546', '', '', '', '本科', '', '', '0000-00-00', '', '2018-09-24', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494576357', null, '无', '1494576357', null, null);
INSERT INTO `think_student` VALUES ('21', null, '0', '张宏翼', '男', '0000-00-00', '', '13026107068', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '5', '1200', '0000-00-00', '', '0000-00-00', '100', '0000-00-00', '7', '0000-00-00', '680', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494579539', null, '无', '1494579730', null, null);
INSERT INTO `think_student` VALUES ('22', null, '0', '3333', '男', '0000-00-00', '33', '33', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '100', '0000-00-00', '7', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494579597', null, '无', '1494579597', null, null);
INSERT INTO `think_student` VALUES ('23', null, '0', '赵巧', '男', '0000-00-00', '', '156897642', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '6小芬5', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494579607', null, '无', '1494579607', null, null);
INSERT INTO `think_student` VALUES ('24', null, '0', '135', '男', '0000-00-00', '', '135', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '6', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494579926', null, '无', '1494579926', null, null);
INSERT INTO `think_student` VALUES ('25', null, '0', '召唤', '男', '0000-00-00', '', '4+6825+2321', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '6', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494579929', null, '无', '1494579929', null, null);
INSERT INTO `think_student` VALUES ('26', null, '0', 'aa', '男', '0000-00-00', '', 'aa', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494579954', null, '无', '1494579954', null, null);
INSERT INTO `think_student` VALUES ('27', null, '0', 'zhanghao', '男', '0000-00-00', '8619118', '258741', 'wuhan', '789456', 'caida ', '本科', '', '2310269960@qq.com', '2017-05-30', 'meiguo ', '2017-05-03', '4', '1500', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '6', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494580973', null, '无', '1494580973', null, null);
INSERT INTO `think_student` VALUES ('28', null, '0', '怪怪', '男', '0000-00-00', '', '135649416', '', '', '', '本科', '', '', '2017-05-31', '', '2018-08-02', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '6小分5', '2017-05-20', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494580973', null, '无', '1494580973', null, null);
INSERT INTO `think_student` VALUES ('29', null, '0', '321', '男', '0000-00-00', '1', '21345', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '1', '0000-00-00', '2', '0000-00-00', '3', '0000-00-00', '4', '0000-00-00', '5', '0000-00-00', '6', '0000-00-00', '1', '1494580974', null, '无', '1494580974', null, null);
INSERT INTO `think_student` VALUES ('30', null, '0', '12587', '男', '2017-05-03', '', '18537915878', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '102', '0000-00-00', '7', '0000-00-00', '700', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494581139', null, '无', '1494581139', null, null);
INSERT INTO `think_student` VALUES ('31', null, '0', '六六', '女', '2017-05-02', '66', '66', '武汉', 'T2017041501', '武汉理工', '本科', '化工', '123@qq.com', '2017-05-01', '美国', '2017-05-01', '5', '12', '2017-05-01', '21', '2017-05-02', '12', '2017-05-03', '21', '2017-05-04', '12', '2017-05-05', '21', '2017-05-06', '12', '2017-05-07', '1', '1494581389', null, 'Wendy', '1494581389', null, null);
INSERT INTO `think_student` VALUES ('32', null, '0', '兽兽', '男', '2002-07-19', '78945335', '156498763135', '湖南', '123', '华南大学', '本科', '会计', '', '2017-06-30', '英国', '2017-09-08', '6', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '7', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494581800', null, 'Lina', '1494581800', null, null);
INSERT INTO `think_student` VALUES ('33', null, '0', '喵喵', '男', '2017-02-09', '', '15679+43246', '杭氧', '456', '海南大学', '研究生', '机械', '', '2017-05-26', '新加坡', '2017-05-28', '5', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '7', '2017-05-12', '680', '2017-05-13', '320', '2017-05-11', '', '0000-00-00', '1', '1494582016', null, 'Lina', '1494582016', null, null);
INSERT INTO `think_student` VALUES ('34', null, '0', '琪琪', '男', '0000-00-00', '12', '1298', '12', '', '12', '本科', '12', '12', '2017-05-01', '12', '2017-05-02', '4', '1', '2017-05-01', '2', '2017-05-02', '3', '2017-05-03', '4', '2017-05-04', '5', '2017-05-05', '6', '2017-05-06', '7', '2017-05-07', '1', '1494582178', null, '333', '1494582178', null, null);
INSERT INTO `think_student` VALUES ('35', null, '0', '张浩汉', '男', '1990-02-15', '84691727', '15927623112', '湖北武汉', '20150501', '华中科技大学', '大专以下', '汉语言文学', '839507114@qq.com', '2017-06-30', '美国', '2018-09-01', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '1494582358', null, '无', '1494582358', null, null);
INSERT INTO `think_student` VALUES ('36', null, '0', '2222222', '男', '0000-00-00', '', '214', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1494582474', null, '无', '1494582474', null, null);
INSERT INTO `think_student` VALUES ('37', null, '0', '张浩汉', '男', '1990-02-15', '84691727', '21089', '湖北武汉', '20150501', '华中科技大学', '大专以下', '汉语言文学', '839507114@qq.com', '2017-06-30', '美国', '2018-09-01', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '1494582694', null, '无', '1494582694', null, null);
INSERT INTO `think_student` VALUES ('38', null, '0', '张浩汉', '男', '1990-02-15', '84691727', '000000213', '湖北武汉', '20150501', '华中科技大学', '大专以下', '汉语言文学', '839507114@qq.com', '2017-06-30', '美国', '2018-09-01', '2', '1300', '2017-05-22', '1500', '2017-05-13', '100', '2017-05-20', '8', '2017-05-31', '700', '2017-05-28', '330', '2017-05-01', '12', '2017-05-02', '1', '1494582739', null, '无', '1494582739', null, null);
INSERT INTO `think_student` VALUES ('39', null, '0', 'aabb', '男', '0000-00-00', '', '1234', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1495091743', null, '无', '1495091743', null, null);
INSERT INTO `think_student` VALUES ('40', null, '0', 'testall', '女', '2017-05-01', '0712-2326160', '18727456556', '太原中北大学', '1001', '中南财经政法大学', '本科', '同行工程', 'stpeng520@163.com', '2011-07-01', '英国', '2017-05-18', '10', '100', '2017-05-01', '99', '2017-05-02', '98', '2017-05-03', '97', '2017-05-04', '96', '2017-05-05', '95', '2017-05-06', '94', '2017-05-07', '1', '1495099512', null, 'Army', '1495099512', null, '360152783');
INSERT INTO `think_student` VALUES ('41', null, '0', '123213', '男', '0000-00-00', '', '12313', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1495099662', null, '无', '1495099662', '0', '');
INSERT INTO `think_student` VALUES ('42', null, '0', 'asd11', '男', '0000-00-00', '', '1232123', '', '', '', '本科', '', '', '0000-00-00', '', '0000-00-00', '1', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1', '1495099887', null, '无', '1495099887', '0', '');
