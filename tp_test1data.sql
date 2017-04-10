/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
   project: tp_test1
 * Author:  lizi
 * Created: 2016-12-27
 */
INSERT INTO `tb_admin` VALUES ('1', 'admin', '123456', '0', '1', '超级1');
INSERT INTO `tb_admin` VALUES ('2', 'weihu', '123123', '0', '3', '运营2');

INSERT INTO `tb_brand` VALUES ('1', '品牌1', '', '50', '0', '2016-12-25 16:54:20', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('2', '品牌2', '', '50', '0', '2016-12-25 16:54:20', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('3', '品牌3', '', '50', '0', '2016-12-25 16:54:20', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('4', 'test', '', '50', '0', '2016-12-26 09:12:26', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('5', '1234', '', '50', '0', '2016-12-25 17:22:42', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('6', '4321', '', '50', '0', '2016-12-25 17:23:21', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('7', '', '', '50', '0', '2016-12-26 11:05:02', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('8', '品牌123123', '', '50', '0', '2016-12-26 11:07:41', '0000-00-00 00:00:00');
INSERT INTO `tb_brand` VALUES ('11', '品牌123123', '', '50', '0', '2016-12-26 11:08:42', '0000-00-00 00:00:00');


INSERT INTO `tb_channel` VALUES ('1', '0', '一级分类1', '50', '0', '2016-12-26 09:13:17', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('2', '1', '家具', '50', '0', '2016-12-26 09:13:40', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('3', '0', '', '50', '0', '2016-12-26 11:05:02', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('4', '0', '', '50', '0', '2016-12-26 11:07:41', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('5', '0', '', '50', '0', '2016-12-26 11:08:42', '0000-00-00 00:00:00');
INSERT INTO `tb_channel` VALUES ('6', '0', '', '50', '2', '2016-12-26 11:56:32', '0000-00-00 00:00:00');


INSERT INTO `tb_goods` VALUES ('1', '2', '0', '1', '商品1', '', '商品描述', '商品规格', '', '999', '999', '0', '200000', '99800', '0', '1', '0', '2016-12-26 09:15:05', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('2', '2', '0', '1', '苹果', '', '', '', '', '0', '0', '0', '0', '0', '0', '1', '0', '2016-12-26 09:45:17', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('4', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:53:54', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('5', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:54:34', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('6', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:55:36', '0000-00-00 00:00:00');
INSERT INTO `tb_goods` VALUES ('7', '0', '0', '0', 'shangpin 456', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '2016-12-26 11:56:32', '0000-00-00 00:00:00');


INSERT INTO `tb_option` VALUES ('1', '商家管理', 'Shop', '0');
INSERT INTO `tb_option` VALUES ('2', '用户管理', 'User', '0');
INSERT INTO `tb_option` VALUES ('3', '商品管理', 'Goods', '0');
INSERT INTO `tb_option` VALUES ('4', '订单管理', 'Order', '0');
INSERT INTO `tb_option` VALUES ('5', '统计信息', 'Report', '0');
INSERT INTO `tb_option` VALUES ('6', '平台设置', 'Platform', '0');

INSERT INTO `tb_role` VALUES ('1', '超级管理员', '', '0');
INSERT INTO `tb_role` VALUES ('2', '管理员', '', '0');
INSERT INTO `tb_role` VALUES ('3', '运营人员', '', '0');

INSERT INTO `tb_role_option` VALUES ('1', '1', '2', '0');
INSERT INTO `tb_role_option` VALUES ('2', '1', '3', '0');
INSERT INTO `tb_role_option` VALUES ('3', '1', '4', '0');
INSERT INTO `tb_role_option` VALUES ('4', '1', '5', '0');
INSERT INTO `tb_role_option` VALUES ('5', '1', '6', '0');
INSERT INTO `tb_role_option` VALUES ('6', '1', '1', '0');
INSERT INTO `tb_role_option` VALUES ('7', '3', '5', '0');
INSERT INTO `tb_role_option` VALUES ('8', '3', '1', '0');
INSERT INTO `tb_role_option` VALUES ('9', '3', '2', '0');


SELECT * FROM tb_admin WHERE loginid=admin;
SELECT * FROM tb_role_option WHERE roleid=1;
SELECT o.name,o.namecn FROM tb_role_option as ro,tb_option as o WHERE ro.roleid=1 AND ro.optionid=o.id;
SELECT o.name,o.namecn FROM tb_role_option as ro,tb_option as o WHERE ro.roleid=3 AND ro.optionid=o.id;