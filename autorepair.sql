-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-07-31 18:31:44
-- 服务器版本： 5.7.26
-- PHP 版本： 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `autorepair`
--

-- --------------------------------------------------------

--
-- 表的结构 `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` tinyint(4) NOT NULL,
  `content` varchar(500) NOT NULL,
  `imgurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `about`
--

INSERT INTO `about` (`id`, `content`, `imgurl`) VALUES
(1, '                        <p>汽车有限公司成立于XXX年XX月XX日，是本地区唯一的授权销售服务中心和特约售后服务中心。主要从事多种品牌的整车销售、 售后服务、配件供应及信息反馈业务。公司秉承 “尊荣无限至上体验”的服务理念，培养更主动贴心的服务意识,追求更周到便捷的服务水准，让每一位车主，都体验到管家般的细致专业，享受到真正待为贵宾般的尊崇体验。</p>\n<p> </p>\n<p>除了为车主提供贴心专业的购车及售后服务，公司还经常组织车主活动，为车主朋友提供一个轻松、愉快的交流平台，让每一位车主都能大家庭里感受到“车生活”更多的乐趣。经过两年的时间，公司已经发展，拥有一流的硬件设施、科学的管理、精湛的技术、诚心的服务品质和积极进取的优秀团队。</p>\n<p> </p>\n <p>真诚期望XXX能成为您的爱车之家！</p>                                                                                               ', '/upload/2019-07-24/156393847850.jpeg');

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `addnum` varchar(255) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `time1` varchar(255) DEFAULT NULL COMMENT '周一~周五',
  `time2` varchar(255) DEFAULT NULL COMMENT '周六、周日',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`id`, `addnum`, `addr`, `tel`, `time1`, `time2`) VALUES
(1, '一店地址', '上海市松江区佘山林荫大道18号', '400-562-6654', '上午9:30-下午8:00', '上午10:00-下午9:00'),
(2, '二店地址', '上海市松江区佘山林荫大道18号', '400-562-6654', '上午9:30-下午8:00', '上午10:00-下午9:00'),
(3, '三店地址', '上海市松江区佘山林荫大道18号', '400-562-6654', '上午9:30-下午8:00', '上午10:00-下午9:00');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `head_img` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 黑名单  1 白名单',
  `create_time` varchar(255) NOT NULL,
  `update_time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `head_img`, `status`, `create_time`, `update_time`) VALUES
(2, 'admin2', '4297f44b13955235245b2497399d7a93', '/static/admin/images/img/head_img2.jpg', 1, '1563766960', ''),
(1, 'admin1', '4297f44b13955235245b2497399d7a93', '/static/admin/images/img/head_img1.jpg', 1, '1563762113', ''),
(38, 'admin3', '96e79218965eb72c92a549dd5a330112', '', 0, '2019-07-22 16:01:51', '');

-- --------------------------------------------------------

--
-- 表的结构 `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `banner`
--

INSERT INTO `banner` (`id`, `img`, `sort`) VALUES
(1, '\\uploads\\20190730\\d707116571dec5c836016dc5593ab7bf.jpg', 10),
(2, '\\uploads\\20190730\\7bffdb9a6cda6203f3da9abafd357919.jpg', 9),
(18, '\\uploads\\20190731\\5e2aad8112261d0f62f5c70f96bee920.jpg', 78),
(17, '\\uploads\\20190731\\e7cb96b4b4f7dbe530089b9e0e3014e8.jpg', 78);

-- --------------------------------------------------------

--
-- 表的结构 `goodsclass`
--

DROP TABLE IF EXISTS `goodsclass`;
CREATE TABLE IF NOT EXISTS `goodsclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL COMMENT '产品分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goodsclass`
--

INSERT INTO `goodsclass` (`id`, `type_name`) VALUES
(1, '刹车油/制动液'),
(3, '防冻冷却液'),
(2, '机油润滑油');

-- --------------------------------------------------------

--
-- 表的结构 `goodsdetail`
--

DROP TABLE IF EXISTS `goodsdetail`;
CREATE TABLE IF NOT EXISTS `goodsdetail` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `img1` varchar(255) NOT NULL COMMENT '缩略图',
  `img2` varchar(255) NOT NULL COMMENT '轮播图',
  `market_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `typeid` int(11) NOT NULL COMMENT '关联产品分类的id',
  `shelf` enum('0','1') DEFAULT '1' COMMENT '上架1  下架0',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goodsdetail`
--

INSERT INTO `goodsdetail` (`gid`, `name`, `img1`, `img2`, `market_price`, `price`, `stock`, `content`, `typeid`, `shelf`, `create_time`, `update_time`) VALUES
(1, '制动液', '\\uploads\\20190731\\267e250a07f680b2188d1d9817765b3e.jpg', '\\uploads\\20190731\\76104a70190867bb7f54b3d1378e035e.jpg,\\uploads\\20190731\\3e5ae99b2404769b68c083669aa4ac1e.jpg,\\uploads\\20190731\\bb30454589f5dab76e1a20190e49f9c0.jpg', 11, 11, 210, '制动液。。', 1, '0', 1564545759, 1564545759),
(4, '防冻', '\\uploads\\20190731\\ea0a4bff3f11bf02522fc0faab267883.jpg', '\\uploads\\20190731\\76104a70190867bb7f54b3d1378e035e.jpg,\\uploads\\20190731\\3e5ae99b2404769b68c083669aa4ac1e.jpg,\\uploads\\20190731\\bb30454589f5dab76e1a20190e49f9c0.jpg', 12, 12, 12, '防冻产品内容详解', 3, '1', 1564545759, 1564545759),
(5, '防冻', '\\uploads\\20190731\\267e250a07f680b2188d1d9817765b3e.jpg', '\\uploads\\20190731\\3ee6e5f453703c5575fcb636d81c01bb.jpg,\\uploads\\20190731\\1ea223909b4d254f0d1ec19c592afc31.jpg,\\uploads\\20190731\\d812a2c64392096ba08a9e6d800ec957.jpg', 12, 12, 12, 'asfjuashfsuafj', 3, '0', 1564550426, 1564550426),
(11, '刹车油', '\\uploads\\20190801\\ae80f0a4061fd7161d59a7ffa6b84967.jpg', '\\uploads\\20190801\\4da054613e6d025356343b7517c99629.jpg,\\uploads\\20190801\\be21b57993aaaf1bc956cdc7ede73b21.jpg,\\uploads\\20190801\\60ada3be79780e46ac110e1e7854480b.jpg', 23, 21, 1231, '', 1, '1', 1564597240, 1564597240),
(6, '润滑油', '\\uploads\\20190731\\1ca71886817a5d7ef1cfe064fe2ee1a0.jpg', '\\uploads\\20190731\\130a84a8da53db0d5e26cb6457966110.jpg,\\uploads\\20190731\\83abd1c2185c1b4edf6bcfec89363788.jpg,\\uploads\\20190731\\d7c440541c3b5fb425d42cacab0cb583.jpg', 52, 32, 1234, '机油润滑油，产品详情', 2, '1', 1564562603, 1564562603),
(9, '冷却液', '\\uploads\\20190731\\4edea09ddef236d51a07fa1b848db542.jpg', '\\uploads\\20190731\\b283e65ef69dfa2b32caee38dd4ad85a.png,\\uploads\\20190731\\6e0d18f0d67859a12ddd3a066213925a.png,\\uploads\\20190731\\7243353d9d54dac4ab587bc8a6c5bfc8.png', 12, 12, 12, '12', 3, '1', 1564563041, 1564563041),
(13, '实验', '\\uploads\\20190801\\a74d47fcd638d19e9477930035f96575.png', '\\uploads\\20190801\\a6733e7115a55f6c0f36d14559f96b43.png,\\uploads\\20190801\\eb219305bd33349a5efc226edaf637fd.png,\\uploads\\20190801\\4e25d8a33f02ee7f346bd53f05d40901.png', 23, 22, 123, '<p><a href=\"http://www.layui.com/\" target=\"_blank\"><u>Layui</u></a>是一款由贤心个人原创的UI框架，这正是我们对高质量的承诺。尽管现在市面上有太多依托在&nbsp;<em>Vue/React</em>&nbsp;光环下的前端方案，但我们仍然定位现在这样一个模式，是为了呈现一个<strong>极简</strong>的解决手段，那就是无需依赖过多看似逼格的工具，直接信手即用。而恰是因为原创，有些事情远比人们想象中的那么简单，尤其是在追求尽善尽美的强迫症的引领下，我常常徘徊在轮子的制造、摧毁又重建的漩涡中，所以<a href=\"http://www.layui.com/\" target=\"_blank\">Layui</a>一拖再拖，从计划到现在，似乎已经接近1年。在我全职接近两个月的SOHO后，Layui的第一个版本终于发布！</p>', 3, '0', 1564597471, 1564597471);

-- --------------------------------------------------------

--
-- 表的结构 `nav`
--

DROP TABLE IF EXISTS `nav`;
CREATE TABLE IF NOT EXISTS `nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `nav`
--

INSERT INTO `nav` (`id`, `name`, `url`, `sort`) VALUES
(1, '关于我们', 'aboutUs', 100),
(2, '产品中心', 'product', 99),
(3, '服务项目', 'service', 98),
(4, '新闻资讯', 'news', 97),
(5, '在线预约', 'online', 96),
(29, '关于公司', 'aboutcompany', 150),
(32, '关于产品', 'about', 200);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `time`, `content`) VALUES
(1, '修车五大禁忌忌开锅时贸然开引擎盖', '2015-01-20', '12:03:00', '汽车电瓶是汽车得以正常行驶不可或缺的动力来源之一，如何避免非正常使用缩短汽车电瓶使用寿命，并延长其使用时间是很多车主关心的问题。\r\n \r\n　　正常情况下，一块车载电瓶的使用寿命为4年，而电瓶寿命的长短与气候情况以及车主的使用习惯也有很大的关系。常见的折损电瓶寿命的因素包括：空 气湿度、灰尘、腐蚀、电极松动或过紧、磨损以及汽车电缆的损坏。在极端情况下，这些因素都可能引起电瓶破裂甚至是更加严重的事故，而湿度和灰尘则被认作是 两个最常见的罪魁祸首。\r\n\r\n \r\n\r\n　　保持电池的干净整洁，并进行定期检测是延长汽车电瓶使用寿命的有效手段，而对汽车电瓶的清洁不同于日常物品，仅用抹布外加清洁用油进行擦拭还远远不够。\r\n\r\n \r\n\r\n　　在清洁过程中首先需要注意检查工作环境是否有明火，尤其注意在清洁期间禁止吸烟，当发动机熄火的时候还应该注意断开电池负极与汽车电缆连接。因 为汽车电池内含大量硫磺的酸会产生易燃氢气，遇明火容易产生爆炸发生危险。然后要记得在清洁开始前以及结束后将所有物品拭干避免短路发生。'),
(3, '你的爱车清理到位了吗 可别忘记排水孔', '2019-07-22', '00:56:22', '  汽车电瓶是汽车得以正常行驶不可或缺的动力来源之一，如何避免非正常使用缩短汽车电瓶使用寿命，并延长其使用时间是很多车主关心的问题。\n \n　　正常情况下，一块车载电瓶的使用寿命为4年，而电瓶寿命的长短与气候情况以及车主的使用习惯也有很大的关系。常见的折损电瓶寿命的因素包括：空 气湿度、灰尘、腐蚀、电极松动或过紧、磨损以及汽车电缆的损坏。在极端情况下，这些因素都可能引起电瓶破裂甚至是更加严重的事故，而湿度和灰尘则被认作是 两个最常见的罪魁祸首。\n\n \n\n　　保持电池的干净整洁，并进行定期检测是延长汽车电瓶使用寿命的有效手段，而对汽车电瓶的清洁不同于日常物品，仅用抹布外加清洁用油进行擦拭还远远不够。\n\n \n\n　　在清洁过程中首先需要注意检查工作环境是否有明火，尤其注意在清洁期间禁止吸烟，当发动机熄火的时候还应该注意断开电池负极与汽车电缆连接。因 为汽车电池内含大量硫磺的酸会产生易燃氢气，遇明火容易产生爆炸发生危险。然后要记得在清洁开始前以及结束后将所有物品拭干避免短路发生。'),
(10, '奥迪推出Q2/Q4受阻 菲亚特抢注名称', '2019-07-22', '18:41:54', '汽车电瓶是汽车得以正常行驶不可或缺的动力来源之一，如何避免非正常使用缩短汽车电瓶使用寿命，并延长其使用时间是很多车主关心的问题。\n \n　　正常情况下，一块车载电瓶的使用寿命为4年，而电瓶寿命的长短与气候情况以及车主的使用习惯也有很大的关系。常见的折损电瓶寿命的因素包括：空 气湿度、灰尘、腐蚀、电极松动或过紧、磨损以及汽车电缆的损坏。在极端情况下，这些因素都可能引起电瓶破裂甚至是更加严重的事故，而湿度和灰尘则被认作是 两个最常见的罪魁祸首。\n\n \n\n　　保持电池的干净整洁，并进行定期检测是延长汽车电瓶使用寿命的有效手段，而对汽车电瓶的清洁不同于日常物品，仅用抹布外加清洁用油进行擦拭还远远不够。\n\n \n\n　　在清洁过程中首先需要注意检查工作环境是否有明火，尤其注意在清洁期间禁止吸烟，当发动机熄火的时候还应该注意断开电池负极与汽车电缆连接。因 为汽车电池内含大量硫磺的酸会产生易燃氢气，遇明火容易产生爆炸发生危险。然后要记得在清洁开始前以及结束后将所有物品拭干避免短路发生。'),
(11, '新能源汽车补贴酝酿新思路', '2019-07-22', '18:42:07', '汽车电瓶是汽车得以正常行驶不可或缺的动力来源之一，如何避免非正常使用缩短汽车电瓶使用寿命，并延长其使用时间是很多车主关心的问题。\n \n　　正常情况下，一块车载电瓶的使用寿命为4年，而电瓶寿命的长短与气候情况以及车主的使用习惯也有很大的关系。常见的折损电瓶寿命的因素包括：空 气湿度、灰尘、腐蚀、电极松动或过紧、磨损以及汽车电缆的损坏。在极端情况下，这些因素都可能引起电瓶破裂甚至是更加严重的事故，而湿度和灰尘则被认作是 两个最常见的罪魁祸首。\n\n \n\n　　保持电池的干净整洁，并进行定期检测是延长汽车电瓶使用寿命的有效手段，而对汽车电瓶的清洁不同于日常物品，仅用抹布外加清洁用油进行擦拭还远远不够。\n\n \n\n　　在清洁过程中首先需要注意检查工作环境是否有明火，尤其注意在清洁期间禁止吸烟，当发动机熄火的时候还应该注意断开电池负极与汽车电缆连接。因 为汽车电池内含大量硫磺的酸会产生易燃氢气，遇明火容易产生爆炸发生危险。然后要记得在清洁开始前以及结束后将所有物品拭干避免短路发生。'),
(9, '配置升级 2015款凯迪拉克XTS到店实拍', '2019-07-22', '18:41:18', '汽车电瓶是汽车得以正常行驶不可或缺的动力来源之一，如何避免非正常使用缩短汽车电瓶使用寿命，并延长其使用时间是很多车主关心的问题。\n \n　　正常情况下，一块车载电瓶的使用寿命为4年，而电瓶寿命的长短与气候情况以及车主的使用习惯也有很大的关系。常见的折损电瓶寿命的因素包括：空 气湿度、灰尘、腐蚀、电极松动或过紧、磨损以及汽车电缆的损坏。在极端情况下，这些因素都可能引起电瓶破裂甚至是更加严重的事故，而湿度和灰尘则被认作是 两个最常见的罪魁祸首。\n\n \n\n　　保持电池的干净整洁，并进行定期检测是延长汽车电瓶使用寿命的有效手段，而对汽车电瓶的清洁不同于日常物品，仅用抹布外加清洁用油进行擦拭还远远不够。\n\n \n\n　　在清洁过程中首先需要注意检查工作环境是否有明火，尤其注意在清洁期间禁止吸烟，当发动机熄火的时候还应该注意断开电池负极与汽车电缆连接。因 为汽车电池内含大量硫磺的酸会产生易燃氢气，遇明火容易产生爆炸发生危险。然后要记得在清洁开始前以及结束后将所有物品拭干避免短路发生。'),
(12, '汽车电瓶养护技巧 五步搞定清洁问题', '2019-07-22', '18:42:28', '汽车电瓶是汽车得以正常行驶不可或缺的动力来源之一，如何避免非正常使用缩短汽车电瓶使用寿命，并延长其使用时间是很多车主关心的问题。\n \n　　正常情况下，一块车载电瓶的使用寿命为4年，而电瓶寿命的长短与气候情况以及车主的使用习惯也有很大的关系。常见的折损电瓶寿命的因素包括：空 气湿度、灰尘、腐蚀、电极松动或过紧、磨损以及汽车电缆的损坏。在极端情况下，这些因素都可能引起电瓶破裂甚至是更加严重的事故，而湿度和灰尘则被认作是 两个最常见的罪魁祸首。\n\n \n\n　　保持电池的干净整洁，并进行定期检测是延长汽车电瓶使用寿命的有效手段，而对汽车电瓶的清洁不同于日常物品，仅用抹布外加清洁用油进行擦拭还远远不够。\n\n \n\n　　在清洁过程中首先需要注意检查工作环境是否有明火，尤其注意在清洁期间禁止吸烟，当发动机熄火的时候还应该注意断开电池负极与汽车电缆连接。因 为汽车电池内含大量硫磺的酸会产生易燃氢气，遇明火容易产生爆炸发生危险。然后要记得在清洁开始前以及结束后将所有物品拭干避免短路发生。');

-- --------------------------------------------------------

--
-- 表的结构 `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) DEFAULT NULL COMMENT '预约服务',
  `time` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `explain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `online`
--

INSERT INTO `online` (`id`, `service`, `time`, `name`, `sex`, `phone`, `explain`) VALUES
(1, '汽车美容', '2017年08月18日', '晓晓', 1, 184585478, '保养'),
(2, '汽车维修', '2019年09月11日', '张三', 0, 1875426521, '保养'),
(3, '钣金喷漆', '2018年12月01日', '李四', 0, 457854124, '保养'),
(4, '汽车美容', '2018年04月12月', '王五', 0, 1452457, '保养'),
(5, '汽车美容', '2019年01月01日', '赵六', 0, 4521456, '保养'),
(6, '汽车美容', '2018年12月30日', '小琴', 1, 1458745, '保养'),
(7, '汽车维修', '2017年04月16日', '赵臻', 1, 145263, '保养'),
(8, '钣金喷漆', '2018年05月04日', '王凯', 0, 145264, '保养'),
(9, '钣金喷漆', '2019年05月29日', '佳佳', 1, 1452632, '保养'),
(10, '汽车维修', '2019年07月18日', '韩梅梅', 1, 1452874, '保养'),
(11, '汽车美容', '2019年07月21日', '柳山', 0, 215024, '保养');

-- --------------------------------------------------------

--
-- 表的结构 `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `sid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sname` varchar(20) DEFAULT NULL,
  `simg` varchar(255) DEFAULT NULL,
  `scon` varchar(100) DEFAULT NULL,
  `ssort` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `service`
--

INSERT INTO `service` (`sid`, `sname`, `simg`, `scon`, `ssort`) VALUES
(1, '汽车改装', '/asset/home/img/service04.jpg', '応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。', 1),
(2, '钣金喷漆', '/asset/home/img/service03.jpg', '応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。', 2),
(3, '汽车维修', '/asset/home/img/service02.jpg', '応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。', 3),
(4, '汽车美容', '/asset/home/img/service01.jpg', '応损捠捡换换，攴朰朲朳枛朸桸桹桺奿妀。夲夳夵壱売壳圢圤圥圦圧，圩圪囡団囤囥咍咎壱売壳圢圤圥圦応损捠捡换换。', 4);

-- --------------------------------------------------------

--
-- 表的结构 `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head_img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL COMMENT '职位',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `team`
--

INSERT INTO `team` (`id`, `head_img`, `name`, `position`) VALUES
(1, '/asset/home/img/person01.jpg', '李大富', '店长'),
(2, '/asset/home/img/person02.jpg', '帅小峰', '副店长'),
(3, '/asset/home/img/person03.jpg', '里斯', '维修师傅1'),
(4, '/asset/home/img/person04.jpg', '赵臻', '维修师傅2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
