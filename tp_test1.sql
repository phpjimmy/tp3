/*
Navicat MySQL Data Transfer

Source Server         : root_loc
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : tp_test1

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2016-12-27 11:21:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `loginid` varchar(50) NOT NULL DEFAULT '' COMMENT '登录帐号',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '登录密码',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '有效状态:0,正常 1,停用',
  `roleid` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', 'admin', '123456', '0', '1', '超级1');
INSERT INTO `tb_admin` VALUES ('2', 'weihu', '123123', '0', '3', '运营2');

-- ----------------------------
-- Table structure for `tb_brand`
-- ----------------------------
DROP TABLE IF EXISTS `tb_brand`;
CREATE TABLE `tb_brand` (
  `brandid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `brandname` varchar(100) NOT NULL COMMENT '品牌名称',
  `brandlogo` varchar(200) NOT NULL COMMENT '品牌logo',
  `listno` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '排序标志',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0有效 1无效',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_brand
-- ----------------------------
INSERT INTO `tb_brand` VALUES ('1', '品牌1', '', '50', '0', '2016-12-25 16:54:20', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('2', '品牌2', '', '50', '0', '2016-12-25 16:54:20', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('3', '品牌3', '', '50', '0', '2016-12-25 16:54:20', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('4', 'test', '', '50', '0', '2016-12-26 09:12:26', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('5', '1234', '', '50', '0', '2016-12-25 17:22:42', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('6', '4321', '', '50', '0', '2016-12-25 17:23:21', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('7', '', '', '50', '0', '2016-12-26 11:05:02', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('8', '品牌123123', '', '50', '0', '2016-12-26 11:07:41', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('11', '品牌123123', '', '50', '0', '2016-12-26 11:08:42', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `tb_cart`
-- ----------------------------
DROP TABLE IF EXISTS `tb_cart`;
CREATE TABLE `tb_cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userid` bigint(20) unsigned NOT NULL COMMENT '用户id',
  `orderid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '订单id',
  `shopid` bigint(20) unsigned NOT NULL COMMENT '商家id',
  `goodsid` bigint(20) unsigned NOT NULL COMMENT '商品id',
  `goodsnum` bigint(20) unsigned NOT NULL COMMENT '商品数量',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0有效 1无效',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_cart
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_channel`
-- ----------------------------
DROP TABLE IF EXISTS `tb_channel`;
CREATE TABLE `tb_channel` (
  `channelid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `superid` bigint(20) NOT NULL COMMENT '父级栏目id,-1时为根栏目',
  `channelname` varchar(100) NOT NULL COMMENT '栏目名称',
  `listno` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '排序标志',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0有效 1无效',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`channelid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_channel
-- ----------------------------
INSERT INTO `tb_channel` VALUES ('1', '0', '一级分类1', '50', '0', '2016-12-26 09:13:17', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('2', '1', '家具', '50', '0', '2016-12-26 09:13:40', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('3', '0', '', '50', '0', '2016-12-26 11:05:02', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('4', '0', '', '50', '0', '2016-12-26 11:07:41', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('5', '0', '', '50', '0', '2016-12-26 11:08:42', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('6', '0', '', '50', '2', '2016-12-26 11:56:32', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `tb_goods`
-- ----------------------------
DROP TABLE IF EXISTS `tb_goods`;
CREATE TABLE `tb_goods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `channelid` bigint(20) NOT NULL COMMENT '商品分类id,对应tb_channel.id',
  `shopid` bigint(20) NOT NULL COMMENT '商品的商家id,对应tb_shop.id',
  `brandid` bigint(20) NOT NULL COMMENT '商品品牌id,对应tb_brand.id',
  `name` varchar(100) NOT NULL COMMENT '名称',
  `goodsimg` varchar(200) NOT NULL COMMENT '商品封面图',
  `note` text NOT NULL COMMENT '商品说明',
  `spec` varchar(200) NOT NULL COMMENT '商品规格说明',
  `url` varchar(200) NOT NULL COMMENT '商品详细说明,wab页面',
  `totalnum` int(10) unsigned NOT NULL COMMENT '商品总数',
  `stroenum` int(10) unsigned NOT NULL COMMENT '库存',
  `salenum` int(10) unsigned NOT NULL COMMENT '销售数量',
  `price` bigint(20) unsigned NOT NULL COMMENT '价格',
  `yhprice` bigint(20) unsigned NOT NULL COMMENT '优惠价格',
  `totalstar` tinyint(3) unsigned NOT NULL COMMENT '商品评价',
  `checkflag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '审核标志:0未审核 1审核',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0有效 1无效',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_goods
-- ----------------------------
INSERT INTO `tb_goods` VALUES ('1', '2', '0', '1', '商品1', '', '商品描述', '商品规格', '', '999', '999', '0', '200000', '99800', '0', '1', '0', '2016-12-26 09:15:05', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('2', '2', '0', '1', '苹果', '', '', '', '', '0', '0', '0', '0', '0', '0', '1', '0', '2016-12-26 09:45:17', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('4', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:53:54', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('5', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:54:34', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('6', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:55:36', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('7', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:56:32', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `tb_option`
-- ----------------------------
DROP TABLE IF EXISTS `tb_option`;
CREATE TABLE `tb_option` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `namecn` varchar(200) NOT NULL DEFAULT '' COMMENT '英文名称-用于生成url',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '有效状态:0,正常 1,停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_option
-- ----------------------------
INSERT INTO `tb_option` VALUES ('1', '商家管理', 'Shop', '0');
INSERT INTO `tb_option` VALUES ('2', '用户管理', 'User', '0');
INSERT INTO `tb_option` VALUES ('3', '商品管理', 'Goods', '0');
INSERT INTO `tb_option` VALUES ('4', '订单管理', 'Order', '0');
INSERT INTO `tb_option` VALUES ('5', '统计信息', 'Report', '0');
INSERT INTO `tb_option` VALUES ('6', '平台设置', 'Platform', '0');

-- ----------------------------
-- Table structure for `tb_order`
-- ----------------------------
DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE `tb_order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userid` bigint(20) unsigned NOT NULL COMMENT '用户id',
  `shopid` bigint(20) unsigned NOT NULL COMMENT '商家id',
  `ordermoney` bigint(20) unsigned NOT NULL COMMENT '订单金额',
  `orderstatus` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态 0:未支付 1:未发货 2:未签收 3:未评价 4:完成 11:超时 12:取消',
  `commentflag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '评价标志 0:未评价 1:已评价',
  `note` varchar(200) NOT NULL COMMENT '备注',
  `addr` varchar(200) NOT NULL COMMENT '地址',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0有效 1无效',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_order
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_role`
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `note` varchar(200) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '有效状态:0,正常 1,停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES ('1', '超级管理员', '', '0');
INSERT INTO `tb_role` VALUES ('2', '管理员', '', '0');
INSERT INTO `tb_role` VALUES ('3', '运营人员', '', '0');

-- ----------------------------
-- Table structure for `tb_role_option`
-- ----------------------------
DROP TABLE IF EXISTS `tb_role_option`;
CREATE TABLE `tb_role_option` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `roleid` int(10) unsigned NOT NULL COMMENT '角色id',
  `optionid` int(10) unsigned NOT NULL COMMENT '权限id',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '有效状态:0,正常 1,停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_role_option
-- ----------------------------
INSERT INTO `tb_role_option` VALUES ('1', '1', '2', '0');
INSERT INTO `tb_role_option` VALUES ('2', '1', '3', '0');
INSERT INTO `tb_role_option` VALUES ('3', '1', '4', '0');
INSERT INTO `tb_role_option` VALUES ('4', '1', '5', '0');
INSERT INTO `tb_role_option` VALUES ('5', '1', '6', '0');
INSERT INTO `tb_role_option` VALUES ('6', '1', '1', '0');
INSERT INTO `tb_role_option` VALUES ('7', '3', '5', '0');
INSERT INTO `tb_role_option` VALUES ('8', '3', '1', '0');
INSERT INTO `tb_role_option` VALUES ('9', '3', '2', '0');

-- ----------------------------
-- Table structure for `tb_shop`
-- ----------------------------
DROP TABLE IF EXISTS `tb_shop`;
CREATE TABLE `tb_shop` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `contactname` varchar(100) NOT NULL COMMENT '联系人名称',
  `contactmobile` varchar(20) NOT NULL COMMENT '联系人手机号码',
  `contacttel` varchar(20) NOT NULL COMMENT '商家电话',
  `shopname` varchar(100) NOT NULL COMMENT '商家名称',
  `shopnameen` varchar(100) NOT NULL COMMENT '商家名称_英文名',
  `shoplogo` varchar(200) NOT NULL COMMENT '商家logo',
  `loginid` varchar(50) NOT NULL COMMENT '登录帐号',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `idnum` varchar(20) NOT NULL COMMENT '二代身份证号码',
  `compid` varchar(50) NOT NULL COMMENT '营业执照',
  `cerflag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '认证状态:0未认证 1认证',
  `totalordernum` bigint(20) unsigned NOT NULL COMMENT '总订单数',
  `totalstar` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '综合评价星级',
  `lastloginidtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后一次登录时间',
  `lastloginip` varchar(50) NOT NULL COMMENT '最后一次登录ip',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0有效 1无效',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `username` varchar(100) NOT NULL COMMENT '用户姓名',
  `nickname` varchar(100) NOT NULL COMMENT '用户昵称',
  `mobile` varchar(20) NOT NULL COMMENT '联系人手机号码',
  `loginid` varchar(50) NOT NULL COMMENT '登录帐号',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `idnum` varchar(20) NOT NULL COMMENT '二代身份证号码',
  `lastloginidtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后一次登录时间',
  `lastloginip` varchar(50) NOT NULL COMMENT '最后一次登录ip',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态:0有效 1无效',
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------

DROP TABLE IF EXISTS `tb_order_comment`;
CREATE TABLE `tb_order_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `orderid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单id',
  `star` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '评论等级',
  `content` text NOT NULL COMMENT '评论内容',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '状态0:有效 1:无效',
  PRIMARY KEY (`id`)
)