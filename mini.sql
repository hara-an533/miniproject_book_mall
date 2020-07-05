/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : mini

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2020-06-20 14:11:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `web1912_xm_admin`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_admin`;
CREATE TABLE `web1912_xm_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL COMMENT '用户名',
  `pwd` char(30) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_admin
-- ----------------------------
INSERT INTO `web1912_xm_admin` VALUES ('1', 'ADMIN', 'def7511da3d0f2d');

-- ----------------------------
-- Table structure for `web1912_xm_book`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_book`;
CREATE TABLE `web1912_xm_book` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `c1id` tinyint(4) unsigned NOT NULL COMMENT '一级分类ID',
  `c2id` tinyint(4) unsigned NOT NULL COMMENT '二级分类ID',
  `code` char(20) NOT NULL,
  `title` varchar(30) NOT NULL COMMENT '图书名称',
  `price` decimal(6,2) NOT NULL COMMENT '价格',
  `poster` char(50) NOT NULL COMMENT '封面地址',
  `author` varchar(20) NOT NULL COMMENT '作者',
  `publicer` varchar(20) NOT NULL COMMENT '出版社',
  `descript` text NOT NULL COMMENT '描述',
  `isfree` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否包邮，1包邮，0不包邮',
  `isrecommend` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否推荐,1推荐，默认0',
  `dt` int(11) NOT NULL COMMENT '上架日期',
  PRIMARY KEY (`id`),
  KEY `index_c1id` (`c1id`) USING HASH,
  KEY `index_c2id` (`c2id`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_book
-- ----------------------------
INSERT INTO `web1912_xm_book` VALUES ('7', '1', '10', '6921734968173', '前端架构：从入门到微前端', '75.80', '159230173962.jpg', '黄峰达', '电子工业出版社', '<h2><span class=\"head_title_name\" title=\"前端架构设计全套实施手册，从架构规范、架构设计到微前端架构拆分，助力大前端时代前端架构设计选型和开发，狼叔等众前端专家力荐，前端的复杂性和可预期的未来决定前端需要更多架构师&nbsp;年中狂欢，更多科技图书每满100减50>&nbsp;\">前端架构设计全套实施手册，从架构规范、架构设计到微前端架构拆分，助力大前端时代前端架构设计选型和开发，狼叔等众前端专家力荐，前端的复杂性和可预期的未来决定前端需要更多架构师</span></h2>', '0', '1', '1592301739');
INSERT INTO `web1912_xm_book` VALUES ('8', '1', '10', '', '后来时间都与你有关', '36.50', '159230199222.jpg', '张皓宸', '天津人民出版社', '<p>总销量突破600万册！张皓宸全新中短篇故事集。十万次握手，百万次相遇，只为你的一个喜欢。果麦出品</p>', '1', '1', '1592301992');
INSERT INTO `web1912_xm_book` VALUES ('9', '1', '10', '', '健康生活新开始', '45.00', '159230324933.jpg', '(美)哈维·戴蒙德', '南海出版公司', '<p>连续40周位于《纽约时报》图书排行榜 首位，33种语言发行，美国版销量超过1200万册，被《出版商周刊》评为“美国出版史 上畅销的25本书之一”，数万中国读者一致推荐！</p>', '1', '1', '1592303249');
INSERT INTO `web1912_xm_book` VALUES ('10', '1', '10', '', '活出健康——免疫力就是好医生', '57.40', '159230344513.jpg', '王贵强、王立祥、张文宏', '人民卫生出版社', '<p>在新冠疫情中我们看到这样一个现象，身处同样的环境，有的人被感染了，有的人却安然无恙；感染同样的病毒，有的人命悬一线，有的人却毫发无损。 原因何在？免疫力！ 面对未知的细菌和病毒，在暂时没有特效药和疫苗的前提下，我们应该如何保护自己和家人？免疫力就是特效药、免疫力就是 疫苗 ，免疫力就是我们身边的好医生！ 《活出健康 免疫力就是好医生》一书由中华医学会感染病学分会主任委员王贵强教授、解放军总医院第三医学中心急诊科主任王立祥教授以及复旦大学附属华山医院感染科主任张文宏教授主编，王陇德院士、钟南山院士、李兰娟院士三位院士审核，获得了中国中央广播电视总台知名主播白岩松倾力推荐，旨在引导公众通过实践健康生活方式，正确认识并获的*免疫力。</p>', '1', '1', '1592303445');
INSERT INTO `web1912_xm_book` VALUES ('11', '1', '10', '', ' 丁香医生健康日历2020', '67.70', '159230367598.jpg', '丁香医生', '中国轻工业出版社', '<p>《健康日历2020》愿意做你温暖、可靠的小玩意儿，让健康伴你度过2020年的每一天。</p>', '0', '1', '1592303675');
INSERT INTO `web1912_xm_book` VALUES ('12', '1', '10', '', '儿童十万个为什么', '11.30', '159230384073.jpg', '刘敬余', '北京教育出版社', '<p>全国名校班主任隆重推荐，专为孩子量身订做的阅读书目。畅销10年，经久不衰，发行量超过7000万册，中国小学生喜爱的图书之一。</p>', '1', '1', '1592303840');
INSERT INTO `web1912_xm_book` VALUES ('13', '1', '10', '', ' 经典畅销人物传记合集：毛泽东传+周恩来传+邓小平传+蒋介石', '147.10', '159230419720.jpg', '（英）迪克·威尔逊 (美)布赖恩·克罗泽', '国际文化出版公司', '<p>经典人物传记套装（精装典藏版套装共四册）</p>', '1', '0', '1592304197');
INSERT INTO `web1912_xm_book` VALUES ('14', '1', '10', '', '王阳明传：知行合一的心学圣人', '40.80', '159230431682.jpg', '燕山刀客', '中国友谊出版公司', '<p>欲成大事者，不可不读王阳明!一本有料有趣有谱的王阳明传记。融合历史作品的厚重、悬疑小说的张力、戏剧的节奏感，深刻剖析知行合一的神奇威力，生动呈现心学圣人的传奇一生。全新修订第二版。</p>', '1', '0', '1592304316');
INSERT INTO `web1912_xm_book` VALUES ('15', '1', '11', '', '未来科技通史', '68.40', '159230469247.jpg', '[瑞典]奥勒·哈格斯特姆', '新世界出版社', '<p>5G、基因编辑、意识上传、脑机接口、纳米机器人……我们的未来要么迅速灭亡，要么更加繁荣；戴维逊奖得主揭示第四次工业革命后的全球趋势，科技或重新定义人的本质</p>', '0', '1', '1592304692');
INSERT INTO `web1912_xm_book` VALUES ('16', '1', '10', '', 'web前端从入门到精通', '23.00', '159237335968.jpg', '水电费', '电子工业出版社', '<p>第三方似懂非懂是收水电费水电费第三方似懂非懂是水电费水电费，水电费水电费是多少，说的，发送到，发送到，方式，地方，水电费水电费水电费水电费水电费水电费水电费水电费第三方似懂非懂是收水电费水电费第三方似懂非懂是水电费水电费，水电费水电费是多少，说的，发送到，发送到，方式，地方，水电费水电费水电费水电费水电费水电费水电第三方似懂非懂是收水电费水电费第三方似懂非懂是水电费水电费，水电费水电费是多少，说的，发送到，发送到，方式，地方，水电费水电费水电费水电费水电费水电费水电</p>', '0', '1', '1592373359');

-- ----------------------------
-- Table structure for `web1912_xm_class1`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_class1`;
CREATE TABLE `web1912_xm_class1` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `c1name` char(2) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_class1
-- ----------------------------
INSERT INTO `web1912_xm_class1` VALUES ('1', '图书');
INSERT INTO `web1912_xm_class1` VALUES ('2', '音乐');
INSERT INTO `web1912_xm_class1` VALUES ('3', '电影');
INSERT INTO `web1912_xm_class1` VALUES ('5', '国家');

-- ----------------------------
-- Table structure for `web1912_xm_class2`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_class2`;
CREATE TABLE `web1912_xm_class2` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `c1id` tinyint(4) NOT NULL COMMENT '一级分类id',
  `url` char(50) NOT NULL,
  `c2name` char(6) NOT NULL COMMENT '二级分类名称',
  PRIMARY KEY (`id`),
  KEY `index_c1id` (`c1id`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_class2
-- ----------------------------
INSERT INTO `web1912_xm_class2` VALUES ('10', '1', '159230118416.png', '科学技术');
INSERT INTO `web1912_xm_class2` VALUES ('11', '1', '159230120937.png', '儿童图书');
INSERT INTO `web1912_xm_class2` VALUES ('12', '1', '159230122734.png', '人物传');
INSERT INTO `web1912_xm_class2` VALUES ('13', '1', '159230124193.png', '青春文学');
INSERT INTO `web1912_xm_class2` VALUES ('14', '1', '159230126610.png', '健康养生');

-- ----------------------------
-- Table structure for `web1912_xm_comment`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_comment`;
CREATE TABLE `web1912_xm_comment` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `sn` char(10) NOT NULL,
  `c1id` tinyint(4) NOT NULL COMMENT '一级分类ID',
  `c2id` tinyint(4) NOT NULL COMMENT '二级分类ID',
  `pid` mediumint(9) NOT NULL COMMENT '产品ID',
  `openid` char(30) NOT NULL COMMENT '用户openid',
  `stars` tinyint(4) NOT NULL COMMENT '1-5星',
  `notes` varchar(100) NOT NULL COMMENT '评论内容',
  `dt` int(11) NOT NULL COMMENT '发表时间',
  PRIMARY KEY (`id`),
  KEY `index_c1id` (`c1id`) USING BTREE,
  KEY `index_c2id` (`c2id`) USING BTREE,
  KEY `index_pid` (`c1id`,`c2id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_comment
-- ----------------------------
INSERT INTO `web1912_xm_comment` VALUES ('4', 'TC78993285', '1', '10', '7', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '4', '似懂非懂负数大多数发顺丰都是死的水电费水电费水电费水电费', '1592630302');
INSERT INTO `web1912_xm_comment` VALUES ('5', 'ML86197174', '1', '10', '7', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '5', '是多少范德萨发生电风扇东方闪电水电费', '1592630312');
INSERT INTO `web1912_xm_comment` VALUES ('6', 'TC78993285', '1', '10', '8', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '5', '搜索水电费水电费水电费水电费', '1592630319');
INSERT INTO `web1912_xm_comment` VALUES ('7', 'TC78993285', '1', '10', '9', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '5', '撒大声地放松放松放松放松房东说', '1592630325');
INSERT INTO `web1912_xm_comment` VALUES ('8', 'ML86197174', '1', '10', '8', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '5', '水电费说的水电费水电费是多少地方', '1592630331');
INSERT INTO `web1912_xm_comment` VALUES ('9', 'ML86197174', '1', '10', '9', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '5', '所得税的地方水电费水电费水电费水电费胜多负少少放点发生的发生的发', '1592630338');

-- ----------------------------
-- Table structure for `web1912_xm_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_favorite`;
CREATE TABLE `web1912_xm_favorite` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `c1id` tinyint(4) NOT NULL COMMENT '一级分类ID',
  `c2id` tinyint(4) NOT NULL COMMENT '二级分类ID',
  `pid` mediumint(9) NOT NULL COMMENT '产品ID',
  `openid` char(30) NOT NULL COMMENT 'openid',
  `status` tinyint(4) NOT NULL COMMENT '状态 1是收藏，0取消',
  `dt` int(11) NOT NULL COMMENT '收藏日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_favorite
-- ----------------------------
INSERT INTO `web1912_xm_favorite` VALUES ('1', '1', '10', '7', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '1', '1592383886');
INSERT INTO `web1912_xm_favorite` VALUES ('2', '1', '10', '8', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '0', '1592385401');

-- ----------------------------
-- Table structure for `web1912_xm_film`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_film`;
CREATE TABLE `web1912_xm_film` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `c1id` tinyint(4) NOT NULL COMMENT '一级分类ID',
  `c2id` tinyint(4) NOT NULL COMMENT '二级分类ID',
  `title` varchar(30) NOT NULL COMMENT '电影名称',
  `price` decimal(6,2) NOT NULL COMMENT '价格',
  `poster` char(50) NOT NULL COMMENT '封面地址',
  `director` varchar(20) NOT NULL COMMENT '导演',
  `roles` varchar(20) NOT NULL COMMENT '演员',
  `scope` varchar(20) NOT NULL COMMENT '地区',
  `mlong` text NOT NULL COMMENT '片长',
  `url` varchar(50) NOT NULL COMMENT '资源',
  `descript` text NOT NULL COMMENT '描述',
  `dt` int(11) NOT NULL COMMENT '上架日期',
  PRIMARY KEY (`id`),
  KEY `index_c1id` (`c1id`) USING BTREE,
  KEY `index_c2id` (`c2id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_film
-- ----------------------------

-- ----------------------------
-- Table structure for `web1912_xm_history`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_history`;
CREATE TABLE `web1912_xm_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c1id` tinyint(4) NOT NULL COMMENT '一级分类ID',
  `c2id` tinyint(4) NOT NULL COMMENT '二级分类ID',
  `pid` mediumint(9) NOT NULL COMMENT '产品ID',
  `openid` char(30) NOT NULL COMMENT 'openid',
  `dt` int(11) NOT NULL COMMENT '收藏日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_history
-- ----------------------------

-- ----------------------------
-- Table structure for `web1912_xm_music`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_music`;
CREATE TABLE `web1912_xm_music` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `c1id` tinyint(4) NOT NULL COMMENT '一级分类ID',
  `c2id` tinyint(4) NOT NULL COMMENT '二级分类ID',
  `title` varchar(30) NOT NULL COMMENT '音乐名称',
  `price` decimal(6,2) NOT NULL COMMENT '价格',
  `poster` char(50) NOT NULL COMMENT '封面地址',
  `singer` varchar(20) NOT NULL COMMENT '歌手',
  `writer` varchar(20) NOT NULL COMMENT '填词',
  `compose` varchar(20) NOT NULL COMMENT '作曲',
  `url` varchar(50) NOT NULL COMMENT '来源',
  `lyric` text NOT NULL COMMENT '歌词',
  `dt` int(11) NOT NULL COMMENT '上架日期',
  PRIMARY KEY (`id`),
  KEY `index_c1id` (`c1id`) USING BTREE,
  KEY `index_c2id` (`c2id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_music
-- ----------------------------

-- ----------------------------
-- Table structure for `web1912_xm_order`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_order`;
CREATE TABLE `web1912_xm_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sn` char(10) NOT NULL COMMENT '订单编号,SN********',
  `c1id` tinyint(4) NOT NULL COMMENT '一级分类ID',
  `c2id` tinyint(4) NOT NULL COMMENT '二级分类ID',
  `pid` mediumint(9) NOT NULL COMMENT '产品ID',
  `openid` char(30) NOT NULL COMMENT '用户名openid',
  `counts` smallint(6) NOT NULL COMMENT '购买数量',
  `dt` int(11) NOT NULL COMMENT '下单日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_order
-- ----------------------------
INSERT INTO `web1912_xm_order` VALUES ('13', 'TC78993285', '1', '10', '7', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '2', '1592549706');
INSERT INTO `web1912_xm_order` VALUES ('14', 'TC78993285', '1', '10', '8', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '1', '1592549706');
INSERT INTO `web1912_xm_order` VALUES ('15', 'TC78993285', '1', '10', '9', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '3', '1592549706');
INSERT INTO `web1912_xm_order` VALUES ('16', 'ML86197174', '1', '10', '7', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '3', '1592629801');
INSERT INTO `web1912_xm_order` VALUES ('17', 'ML86197174', '1', '10', '8', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '2', '1592629801');
INSERT INTO `web1912_xm_order` VALUES ('18', 'ML86197174', '1', '10', '9', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '1', '1592629801');

-- ----------------------------
-- Table structure for `web1912_xm_thumb`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_thumb`;
CREATE TABLE `web1912_xm_thumb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(9) NOT NULL COMMENT '图书ID',
  `url` char(50) NOT NULL COMMENT '地址',
  PRIMARY KEY (`id`),
  KEY `index_pid` (`pid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_thumb
-- ----------------------------
INSERT INTO `web1912_xm_thumb` VALUES ('28', '11', '1592303675320.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('27', '10', '1592303445591.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('26', '10', '1592303445560.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('25', '9', '1592303249662.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('24', '9', '1592303249121.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('23', '9', '1592303249360.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('22', '8', '1592301992302.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('21', '8', '1592301992681.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('20', '8', '1592301992610.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('19', '7', '1592301739163.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('18', '7', '1592301739612.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('17', '7', '1592301739371.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('16', '7', '1592301739750.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('29', '11', '1592303675431.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('30', '11', '1592303675582.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('31', '11', '1592303675373.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('32', '12', '1592303840700.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('33', '12', '1592303840201.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('34', '12', '1592303840222.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('35', '13', '1592304197780.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('36', '13', '1592304197861.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('37', '13', '1592304197102.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('38', '13', '1592304197493.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('39', '14', '1592304316370.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('40', '14', '1592304316691.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('41', '15', '1592304692710.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('42', '15', '1592304692881.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('43', '15', '1592304692712.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('44', '15', '1592304692753.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('45', '15', '1592304692674.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('46', '16', '1592373359550.jpg');
INSERT INTO `web1912_xm_thumb` VALUES ('47', '16', '1592373359221.jpg');

-- ----------------------------
-- Table structure for `web1912_xm_user`
-- ----------------------------
DROP TABLE IF EXISTS `web1912_xm_user`;
CREATE TABLE `web1912_xm_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` char(30) NOT NULL COMMENT 'openid',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `tel` char(11) NOT NULL COMMENT '手机号',
  `address` varchar(200) NOT NULL COMMENT '收货地址',
  `post` char(6) NOT NULL COMMENT '邮编',
  `ico` char(50) NOT NULL COMMENT '头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web1912_xm_user
-- ----------------------------
INSERT INTO `web1912_xm_user` VALUES ('6', 'oKDaI5ApYCedhbiqT-uiI_geAcoI', '张旭阳', '18086605232', '江苏省苏州市吴中区太湖东路288号', '', '159254583914.png');
