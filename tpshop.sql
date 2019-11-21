/*
 Navicat Premium Data Transfer

 Source Server         : chun
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : tpshop

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 21/11/2019 17:31:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `keywords` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关键词',
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `author` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作者',
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '电子邮箱',
  `link_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '外键',
  `thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '缩略图',
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `show_top` tinyint(1) NOT NULL DEFAULT 0 COMMENT '置顶:1:是0:否',
  `show_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '显示:1是:0:否',
  `cate_id` smallint(6) NOT NULL COMMENT '所属栏目',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES (12, 'jiji', '', '', '', '', '', NULL, '<p><img src=\"/ueditor/20191112/1573545824814118.gif\" title=\"1573545824814118.gif\" alt=\"zxyy.gif\"/></p>', 0, 1, 51, 1573545835);
INSERT INTO `tp_article` VALUES (13, '852053', '测试无', '测试无', '测试无', '235228213@qq.com', 'http://ikremds', NULL, '<p><img src=\"/ueditor/20191112/1573558041618366.jpg\" title=\"1573558041618366.jpg\" alt=\"439213_202155159031_2.jpg\"/></p>', 0, 1, 58, 1573558043);
INSERT INTO `tp_article` VALUES (11, '987654', '', '', '', '', '', NULL, '<p><img src=\"/ueditor/php/upload/image/20191112/1573521512530926.jpg\" title=\"1573521512530926.jpg\" alt=\"timg7.jpg\"/></p>', 0, 1, 51, 1573521692);
INSERT INTO `tp_article` VALUES (10, '测试二', '测试二', '测试二', '测试二', '2352282123@qq.com', 'http://require', '20191112\\571164663773abaaa7a05711eb9d8f98.jpg', '<p>测试二测试二测试二</p>', 0, 1, 51, 1573521365);

-- ----------------------------
-- Table structure for tp_attr
-- ----------------------------
DROP TABLE IF EXISTS `tp_attr`;
CREATE TABLE `tp_attr`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性名称',
  `attr_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '属性类型1:单选2:唯一',
  `attr_values` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性之间',
  `type_id` smallint(6) NOT NULL COMMENT '所属类型',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_attr
-- ----------------------------
INSERT INTO `tp_attr` VALUES (1, '颜色', 1, '黑色,白色,银色', 1);
INSERT INTO `tp_attr` VALUES (2, '衣长', 1, '1,2,3', 2);

-- ----------------------------
-- Table structure for tp_brand
-- ----------------------------
DROP TABLE IF EXISTS `tp_brand`;
CREATE TABLE `tp_brand`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '品牌ID',
  `brand_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '品牌名称',
  `brand_url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '品牌路径',
  `brand_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '品牌logo',
  `brand_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '品牌描述',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '品牌排序',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:显示 0:隐藏',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_brand
-- ----------------------------
INSERT INTO `tp_brand` VALUES (3, '无情', 'quwin', '20191104\\e48744ff66596dcf7a543b5bbe1701e4.png', '<p>9527&nbsp; &nbsp;&nbsp;</p>', 50, 0);
INSERT INTO `tp_brand` VALUES (23, '淘宝', 'http://taobao.com', '20191104\\6a3e460912198a5167ab6cdc2c9748a2.jpg', '<p>淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝淘宝</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (5, '玉华', 'http://12', NULL, '<p>12</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (8, '23', 'http://75', NULL, '<p>45</p>', 50, 0);
INSERT INTO `tp_brand` VALUES (9, '6543', 'http://45657', NULL, '<p>3456789</p>', 50, 0);
INSERT INTO `tp_brand` VALUES (10, '23', 'http://www.baidu.com', NULL, '<p>134</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (11, '玉华', 'http://12', NULL, '<p>13333</p>', 50, 0);
INSERT INTO `tp_brand` VALUES (12, '玉华', 'http://www.baidu.com', NULL, '<p>520</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (13, '玉华', 'http://13245', NULL, '<p>123</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (14, '玉华', 'http://324567', NULL, '<p>235456</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (15, '12345', 'http://12355768', NULL, '<p>1</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (16, '谷歌', 'http://google', '20191104\\dd3525708a42e8bb6f898f81c858bda0.jpg', '<p>谷sf</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (24, '北大', 'http://beida.com', NULL, '<p>北大欢迎你</p>', 50, 1);
INSERT INTO `tp_brand` VALUES (25, '我强势', 'http://12', NULL, '', 50, 1);
INSERT INTO `tp_brand` VALUES (26, ' 我去', 'http://qqwe', NULL, '', 50, 1);
INSERT INTO `tp_brand` VALUES (27, '大师傅v', 'http://ads', NULL, '<p>厄齐尔群二<br/></p>', 50, 1);

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '栏目Id',
  `cate_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '栏目名称',
  `cate_type` tinyint(1) NOT NULL DEFAULT 5 COMMENT '栏目类型:1:系统分类2:帮助分类3:网店帮助4:网点信息5:普通分类',
  `keywords` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关键词',
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `show_nav` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否显示到导航栏1:显示到导航栏0:不显示到导航栏',
  `allow_son` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:是 0: 否  允许添加子分类',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  `pid` smallint(6) NOT NULL DEFAULT 0 COMMENT '上级栏目ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 59 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES (1, '系统分类', 1, '<p>系统分类</p>', '<p>系统分类</p>', 0, 0, 1, 0);
INSERT INTO `tp_cate` VALUES (2, '网店帮助分类', 2, '<p>网店帮助分类</p>', '<p>网店帮助分类</p>', 0, 1, 11, 1);
INSERT INTO `tp_cate` VALUES (3, '网店信息', 4, '<p>网点信息</p>', '<p>网点信息</p>', 0, 0, 12, 1);
INSERT INTO `tp_cate` VALUES (4, '新手上路1', 3, '<p>新手上路12</p> ', '<p>新手上路1</p>', 0, 0, 50, 2);
INSERT INTO `tp_cate` VALUES (5, '配送与支付', 3, '<p>配送与支付</p>', '<p>配送与支付</p>', 0, 0, 50, 2);
INSERT INTO `tp_cate` VALUES (52, '会员管理', 3, '会员管理', '会员管理', 0, 0, 50, 2);
INSERT INTO `tp_cate` VALUES (51, '测试二', 5, '', '', 0, 1, 2, 0);
INSERT INTO `tp_cate` VALUES (58, '测试一', 5, '测试一', '测试一', 0, 1, 50, 0);

-- ----------------------------
-- Table structure for tp_category
-- ----------------------------
DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品分类名称',
  `cate_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '栏目缩略图',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关键词',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `show_cate` tinyint(1) NOT NULL DEFAULT 0 COMMENT '导航 1:显示 0:隐藏',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  `pid` smallint(6) NOT NULL DEFAULT 0 COMMENT '上级栏目id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_category
-- ----------------------------
INSERT INTO `tp_category` VALUES (1, '男装', '', '男装', '男装男装', 0, 1, 0);
INSERT INTO `tp_category` VALUES (3, '测试一', '20191118\\f978a3847a28b3ffe22ae8b079a787b0.jpg', '测试一', '测试一', 1, 6, 0);
INSERT INTO `tp_category` VALUES (7, '裤子', '20191119\\e38d6bbe6dfaae79ecc1842657849401.jpg', '裤子', '裤子', 1, 3, 6);
INSERT INTO `tp_category` VALUES (6, '西装', NULL, '', '', 1, 2, 1);

-- ----------------------------
-- Table structure for tp_conf
-- ----------------------------
DROP TABLE IF EXISTS `tp_conf`;
CREATE TABLE `tp_conf`  (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `ename` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '英文名称',
  `cname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '中文名称',
  `form_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'input' COMMENT '表单类型',
  `conf_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '配置类型 1:网店配置信息 2:商品配置信息',
  `values` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '可选值',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '默认值',
  `sort` smallint(6) NOT NULL DEFAULT 50 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_conf
-- ----------------------------
INSERT INTO `tp_conf` VALUES (1, 'site_keywords', '站点关键词', 'input', 1, '', 'changchunsinger', 6);
INSERT INTO `tp_conf` VALUES (2, 'site_description', '站点描述', 'textarea', 1, '', '我的网站我的网站我的网站', 5);
INSERT INTO `tp_conf` VALUES (3, 'close_site', '关闭站点', 'radio', 1, '是,否', '否', 4);
INSERT INTO `tp_conf` VALUES (4, 'logo', '网站logo', 'file', 1, '', '20191118\\12ab7615d6eb3656f36e72bf123d6456.png', 3);
INSERT INTO `tp_conf` VALUES (5, 'reg', '会员注册', 'select', 1, '开启,关闭', '关闭', 2);
INSERT INTO `tp_conf` VALUES (6, 'checks', '多选测试', 'checkbox', 1, '选项1,选项2,选项3,选项4', '', 1);
INSERT INTO `tp_conf` VALUES (7, 'site_name', '站点名称', 'input', 1, '', '我的网站', 7);
INSERT INTO `tp_conf` VALUES (10, 'cs', '测试', 'input', 2, '', '测试23', 50);
INSERT INTO `tp_conf` VALUES (8, 'ewm', '二维码', 'file', 1, '', '20191118\\b6782fbfd658b88c211dc41705148cdd.jpg', 3);
INSERT INTO `tp_conf` VALUES (9, 'ces', '测试复选框', 'checkbox', 1, '测试1,测试2,测试3,测试4', '', 0);
INSERT INTO `tp_conf` VALUES (11, 'ts', '每页天数', 'checkbox', 2, '5,10,15', '5,10,15', 50);

-- ----------------------------
-- Table structure for tp_goods
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods`  (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  `goods_num` char(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品编号',
  `og_thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '原图',
  `sm_thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '小缩略图',
  `mid_thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '中缩略图',
  `big_thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '打缩略图',
  `markte_price` decimal(10, 2) NOT NULL COMMENT '市场价',
  `shop_price` decimal(10, 2) NOT NULL COMMENT '本店价',
  `on_sale` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否上架1:上架0:下架',
  `category_id` mediumint(9) NOT NULL COMMENT '所属栏目',
  `brand_id` mediumint(9) NOT NULL DEFAULT 0 COMMENT '所属品牌',
  `type_id` mediumint(9) NOT NULL DEFAULT 0 COMMENT '所属类型',
  `goods_des` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `goods_weight` decimal(10, 2) NOT NULL COMMENT '重量',
  `weight_unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'kg' COMMENT '单位',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`, `brand_id`, `type_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_link
-- ----------------------------
DROP TABLE IF EXISTS `tp_link`;
CREATE TABLE `tp_link`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `link_url` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接地址',
  `logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '友情链接logo',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接描述',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '链接类型:1:文字 2:图片',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态 1:启用 0:禁用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_link
-- ----------------------------
INSERT INTO `tp_link` VALUES (1, '长春个人博客', 'http://122.51.158.157', NULL, '长春个人博客', 1, 1);
INSERT INTO `tp_link` VALUES (2, '百度', 'http://baidu.com', NULL, '百度百度', 1, 1);

-- ----------------------------
-- Table structure for tp_type
-- ----------------------------
DROP TABLE IF EXISTS `tp_type`;
CREATE TABLE `tp_type`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_type
-- ----------------------------
INSERT INTO `tp_type` VALUES (1, '笔记本');
INSERT INTO `tp_type` VALUES (2, '女装');

SET FOREIGN_KEY_CHECKS = 1;
