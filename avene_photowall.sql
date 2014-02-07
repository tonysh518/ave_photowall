-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2014 at 05:59 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `avene_photowall`
--

-- --------------------------------------------------------

--
-- Table structure for table `Photo`
--

CREATE TABLE `Photo` (
  `pid` int(25) NOT NULL AUTO_INCREMENT COMMENT 'photo id',
  `weibo_id` bigint(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL COMMENT 'image url',
  `screen_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'weibo screen name',
  `gender` varchar(5) NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sns_uid` bigint(50) NOT NULL COMMENT 'weibo uid',
  `avatar` varchar(255) NOT NULL COMMENT 'weibo avatar url',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'content',
  `status` int(1) NOT NULL,
  `datetime` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `Photo`
--

INSERT INTO `Photo` (`pid`, `weibo_id`, `url`, `image`, `screen_name`, `gender`, `location`, `sns_uid`, `avatar`, `content`, `status`, `datetime`) VALUES
(1, 3675445956901844, 'AvEH1sXu4', '/upload/20140207/3675445956901844.jpg', 'Shally1122Rain', 'f', '吉林 长春', 1075330930, 'http://tp3.sinaimg.cn/1075330930/50/5613979844/0', '#淘宝让红包飞#开心到爆啊，我刚刚用淘宝大礼包成功兑换了5个淘金币和3张店铺红包的领取机会！！亲们也来参加淘宝让红包飞活动吧，下一个中奖的就是你！http://t.cn/8k0cXe8 http://t.cn/8Fow1JH', 0, 1391778078),
(2, 3675445956901603, 'AvEH1sXqb', '/upload/20140207/3675445956901603.jpg', '懵懂ZJX', 'f', '广东 广州', 3935882523, 'http://tp4.sinaimg.cn/3935882523/50/5681626190/0', '色彩斑斓，和你一起感受！我正在使用"斑斓"封面图，好漂亮，你们都快来试试！http://t.cn/8kxuZkb', 0, 1391778079),
(3, 3675445956901599, 'AvEH1sXq7', '/upload/20140207/3675445956901599.jpg', 'YFY_汤圆', 'f', '广东 汕头', 2236629970, 'http://tp3.sinaimg.cn/2236629970/50/5683780199/0', '我输了。', 0, 1391778080),
(4, 3675445956901451, 'AvEH1sXnJ', '/upload/20140207/3675445956901451.jpg', '陈思杨喜欢沉思', 'f', '重庆 合川区', 2119258175, 'http://tp4.sinaimg.cn/2119258175/50/5680006331/0', '作为儿媳妇和孙媳妇，有我在这里哪怕是稍微表现下也好吧，在家里的时候，天天夜里呻吟都不起床问一声，到医院来了更是不来看一眼！先不说作为媳妇的本分，老人这一辈子没有功劳也有苦劳吧！我又是外人不好说你得！真的是不晓得是啥子动物！[愤怒] 我在:http://t.cn/8Fow1xq', 0, 1391778089),
(5, 3675445956901334, 'AvEH1sXlQ', '/upload/20140207/3675445956901334.jpg', '服装时尚趋势a', 'f', '山东 济南', 3181751191, 'http://tp4.sinaimg.cn/3181751191/50/40009663142/0', '.祛痘神器isonic光学祛痘仪，采用德国专利，24小时消炎祛痘，对座疮、青春痘等发炎类型的痘痘能快速消炎，不留痘印。是祛痘的必备产品！而且机身小巧便携。折扣价599.5元 http://t.cn/8Fa1TXG', 0, 1391778090),
(6, 3675445956901120, 'AvEH1sXio', '/upload/20140207/3675445956901120.jpg', '海隅的风', 'm', '甘肃 酒泉', 2794602000, 'http://tp1.sinaimg.cn/2794602000/50/0/1', '#新浪新闻让红包飞#宋江不是给牢城官营给了好处，随便出来喝酒吃肉，在浔阳江酒楼题了反诗吗？……他日若遂凌云志……我们要警惕啊！ 《获刑官员保外就医屡屡走样》  http://t.cn/8FSkTxK', 0, 1391778090),
(7, 3675445956555445, 'AvEH1rvmZ', '/upload/20140207/3675445956555445.jpg', '佳佳ho-', 'f', '广东 揭阳', 3180827173, 'http://tp2.sinaimg.cn/3180827173/50/5684852226/0', '很想难过的时候去海边走走，可惜我生活的城市没有海 http://t.cn/8Fow1Jm', 0, 1391778091),
(8, 3675445956555324, 'AvEH1rvl2', '/upload/20140207/3675445956555324.jpg', 'Lady潮衣精选', 'f', '广东 韶关', 3123002952, 'http://tp1.sinaimg.cn/3123002952/50/40012874391/0', '.阿胶，有补益气血、强身健脑、丰肌泽肤等功效。被认为是 “动物中的人参”两者结合相辅相成，补血美肤效果倍增！真可谓是男女老少皆宜的补血美容圣品！ http://t.cn/8Fa3AUq', 0, 1391778091),
(9, 3675445956554748, 'AvEH1rvbK', '/upload/20140207/3675445956554748.jpg', '服装搭配前线a', 'f', '山东 东营', 3185674143, 'http://tp4.sinaimg.cn/3185674143/50/40009662011/0', '.现代人讲究保健养生，老人求长寿无病，幼儿求茁壮健康，女人求青春美貌，男人求精富力强，这一切，阿胶全部可以满足！  http://t.cn/8FauAZQ', 0, 1391778092),
(10, 3675445956554709, 'AvEH1rvb7', '/upload/20140207/3675445956554709.jpg', '阿娜呀呀', 'f', '其他', 2797838077, 'http://tp2.sinaimg.cn/2797838077/50/5660209953/0', '没意思 我在:http://t.cn/8FIgdq7', 0, 1391778092),
(11, 3675445956316110, 'AvEH1qv6K', '/upload/20140207/3675445956316110.jpg', '潮衣大全a', 'f', '广东 广州', 3185691853, 'http://tp2.sinaimg.cn/3185691853/50/40009608646/0', '.真的很不错！[赞][赞]这瓶4号因子微雕原液对于敏感肌特别好，肌肤敏感、红肿、红血丝、缺水、粗糙、毛孔粗大，一瓶搞定！在美容院热销了差不多有15年，效果可不是市面原液可以比拟。[嘻嘻][哈哈] http://t.cn/8FaF3AY', 0, 1391778093),
(12, 3675445956316076, 'AvEH1qv6c', '/upload/20140207/3675445956316076.jpg', '重口味张凯', 'm', '陕西 安康', 2669582511, 'http://tp4.sinaimg.cn/2669582511/50/5684047944/1', '#汉字英雄#经常念错好多，特别是木讷[哼]', 0, 1391778093),
(13, 3675445956316038, 'AvEH1qv5A', '/upload/20140207/3675445956316038.jpg', 'Jelly李洁', 'f', '福建 厦门', 2375599185, 'http://tp2.sinaimg.cn/2375599185/50/5686319584/0', '暖心的家庭煮男 ❤', 1, 1391778095),
(14, 3675445956316033, 'AvEH1qv5v', '/upload/20140207/3675445956316033.jpg', '扔枚硬币乐一下', 'm', '福建 厦门', 2972962684, 'http://tp1.sinaimg.cn/2972962684/50/5686465395/1', '终于要安定下来准备开始工作咯。[哈哈][哈哈][哈哈][哈哈]@kelly小妃妃 我在这里:http://t.cn/z8AtIK7', 0, 1391778095),
(15, 3675445956078918, 'AvEH1pvp4', '/upload/20140207/3675445956078918.jpg', '娜是我nana', 'f', '浙江 杭州', 1989235891, 'http://tp4.sinaimg.cn/1989235891/50/5686727207/0', '询价微信nashiwo707039', 0, 1391778105),
(16, 3675445956078898, 'AvEH1pvoK', '/upload/20140207/3675445956078898.jpg', '季节穿衣前线b9', 'f', '西藏 那曲', 1839310842, 'http://tp3.sinaimg.cn/1839310842/50/5679178256/0', '.即食阿胶糕固元膏，长期吃阿胶糕对女士来说是非常好的，令肌肤光滑有弹性，对女生痛经也有良好的改善作用！1，下： 2，上： http://t.cn/8FadNnw', 1, 1391778105),
(17, 3675445956078879, 'AvEH1pvor', '/upload/20140207/3675445956078879.jpg', '天边鱼肚白泛起时的第一屉包子', 'f', '黑龙江 鸡西', 2750767423, 'http://tp4.sinaimg.cn/2750767423/50/22865454082/0', '今天把小楼的微博看了一遍...发现兔兔的第一条微博和小楼的第一条微博 要表达的东西 但是风格明显不同 [呵呵]', 0, 1391778107),
(18, 3675445952975875, 'AvEH1cu9Z', '/upload/20140207/3675445952975875.jpg', '桃李满天下08u', 'm', '云南 曲靖', 2891069517, 'http://tp2.sinaimg.cn/2891069517/50/0/1', '相爱的人不会因为一句分手而结束， 更不会因为一个错误而真的做到一次不忠百次不容。 相爱的人会在感情的曲折里一起成长。只要经过一个曲折熬了过去爱就又增长了点， 又一个曲折熬了过去大家学会珍惜对方一点。 一路下去爱越来越深，只会深深的相爱着， 懂得对方的好，不会再分开。', 0, 1391778107),
(19, 3675445952706528, 'AvEH1bm5G', '/upload/20140207/3675445952706528.jpg', '良人_orange', 'm', '山东 济南', 1567035161, 'http://tp2.sinaimg.cn/1567035161/50/5666063007/1', '燕姿所有现场最喜欢的一首。[鲜花][鲜花][鲜花]  【视频：我不难过-孙燕姿.-.2005飞跃红馆香港演唱会】http://t.cn/8FUwKTf', 0, 1391778108),
(20, 3675445952706247, 'AvEH1bm19', '/upload/20140207/3675445952706247.jpg', '潮IN美衣', 'f', '北京 东城区', 3215183324, 'http://tp1.sinaimg.cn/3215183324/50/22837377013/0', '黛米珍珠，清雅平和，让妈妈的美有韵味~~~>>>http://t.cn/8k1EpUA[笑哈哈]', 0, 1391778108),
(21, 3675445952706179, 'AvEH1bm03', '/upload/20140207/3675445952706179.jpg', '糖醋的鱼', 'f', '河北 邯郸', 1070730770, 'http://tp3.sinaimg.cn/1070730770/50/5647589901/0', '机场送人，现在的飞机晚点真厉害！！ 我在:http://t.cn/8FJuoj7', 0, 1391778109),
(22, 3675445952706132, 'AvEH1blZi', '/upload/20140207/3675445952706132.jpg', '不倒翁女侠', 'f', '浙江 温州', 2638560157, 'http://tp2.sinaimg.cn/2638560157/50/5654347401/0', ' 【美味食堂】栗子玫瑰面包卷，栗子馅香，视觉味觉的双重享受（分享自微淘  的广播） http://t.cn/8Fow37T', 0, 1391778118),
(23, 3675445952705944, 'AvEH1blWg', '/upload/20140207/3675445952705944.jpg', '七侠之风彩男女合欢', 'f', '其他', 3950040044, 'http://tp1.sinaimg.cn/3950040044/50/5682772379/0', '过年之后大家都很忙只有我有时间去玩', 0, 1391778119),
(24, 3675445952360210, 'AvEH19TZU', '/upload/20140207/3675445952360210.jpg', 'Lady潮流趋势c5', 'f', '上海 浦东新区', 2286707850, 'http://tp3.sinaimg.cn/2286707850/50/5679219821/0', '.现代人讲究保健养生，老人求长寿无病，幼儿求茁壮健康，女人求青春美貌，男人求精富力强，这一切，阿胶全部可以满足！  http://t.cn/8FamMuy', 0, 1391778119),
(25, 3675445952359585, 'AvEH19TPP', '/upload/20140207/3675445952359585.jpg', '女士服装速递a', 'f', '福建 三明', 3185684473, 'http://tp2.sinaimg.cn/3185684473/50/40009613972/0', '.阿胶，有补益气血、强身健脑、丰肌泽肤等功效。被认为是 “动物中的人参”两者结合相辅相成，补血美肤效果倍增！真可谓是男女老少皆宜的补血美容圣品！  http://t.cn/8Fagl2A', 0, 1391778120),
(26, 3675445952359528, 'AvEH19TOU', '/upload/20140207/3675445952359528.jpg', '微问助手', 'm', '北京', 2711987451, 'http://tp4.sinaimg.cn/2711987451/50/40020028049/1', '@原创晓月 您好！来自【微问】的网友向您请教小说方面的问题：“水浒传陶忠旺如何上山 ”『分享知识和经验来帮助TA，请点击 http://t.cn/8Fow142 』回答还能攒积分换礼品，iPad在向你招手！不愿收到求助信息请点击http://t.cn/zTPze3U', 0, 1391778120),
(27, 3675445952359244, 'AvEH19TKk', '/upload/20140207/3675445952359244.jpg', '堇_Se', 'f', '其他', 1595326932, 'http://tp1.sinaimg.cn/1595326932/50/40009762586/0', '波波托同事厦门带回的青芒，个大味甜，两个五十多块钱。我拿勺子舀着吃，他说这么吃一点都不爽，于是我舀了一半，其余都留给他啃[偷笑]', 0, 1391778120),
(28, 3675445952359200, 'AvEH19TJC', '/upload/20140207/3675445952359200.jpg', 'sunxu7892', 'm', '安徽 马鞍山', 1248967485, 'http://tp2.sinaimg.cn/1248967485/50/0/1', '小伙伴们，我很严肃地跟你们说一件事儿。我……中奖啦！！！是的，你没有听错，刚参加360云盘的#爱云盘爱分享#活动，竟然中了50G空间，还有机会获得苹果Macbook Air、iPhone 5s或者iPad mini，还不来试一把？活动地址：http://t.cn/8kCPdCf', 0, 1391778121),
(29, 3675445952359175, 'AvEH19TJd', '/upload/20140207/3675445952359175.jpg', 'jacky張習明', 'm', '广东 广州', 2157575360, 'http://tp1.sinaimg.cn/2157575360/50/5604232379/1', '真的是超高級車，坐在一個人的位子，準備出發了，明早就是探訪另外一個城市，see you 幸福中的孩子們', 0, 1391778122);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user name',
  `screen_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'password',
  `salt` varchar(30) NOT NULL COMMENT 'salt',
  `sns_uid` varchar(50) NOT NULL,
  `access_token` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `tel` int(15) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(5) NOT NULL,
  `reg_datetime` int(16) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`uid`, `username`, `screen_name`, `password`, `salt`, `sns_uid`, `access_token`, `avatar`, `tel`, `gender`, `location`, `role`, `reg_datetime`) VALUES
(1, '猪哥小凌', '', '', '', '1856415417', '2.00J91dBCuMB5zDb2edc97c8ajTvfMC', 'http://tp2.sinaimg.cn/1856415417/180/5638235242/1', 0, '', '', 0, 1391492054),
(2, 'avene', '', '6a635240c25aa65985d678dfa77c4b0b', '', '', '', '', 0, '', '', 2, 0),
(3, 'fuel-it-up', 'fuel-it-up', '', '', '3164070184', '2.00EMHI9DuMB5zD0d1a992d560qZyRO', 'http://tp1.sinaimg.cn/3164070184/180/40026419140/1', 0, 'm', '上海 卢湾区', 0, 1391777894);

-- --------------------------------------------------------

--
-- Table structure for table `Winner`
--

CREATE TABLE `Winner` (
  `wid` int(16) NOT NULL AUTO_INCREMENT,
  `month` int(2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `prize` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prize_img` varchar(255) NOT NULL,
  PRIMARY KEY (`wid`),
  UNIQUE KEY `wid` (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Winner`
--

INSERT INTO `Winner` (`wid`, `month`, `photo`, `name`, `avatar`, `tel`, `prize`, `prize_img`) VALUES
(1, 2, '/upload/winner/1.jpg', '嘟嘟', 'http://tp4.sinaimg.cn/2139885703/180/40003422142/1', '13233232', 'iPad Air 32G Wifi版', '/upload/winner/2.jpg'),
(2, 3, '/upload/winner/1.jpg', '嘟嘟', 'http://tp4.sinaimg.cn/2139885703/180/40003422142/1', '13233232', 'iPad Air 32G Wifi版', '/upload/winner/2.jpg'),
(3, 4, '/upload/winner/1.jpg', '嘟嘟', 'http://tp4.sinaimg.cn/2139885703/180/40003422142/1', '13233232', 'iPad Air 32G Wifi版', '/upload/winner/2.jpg'),
(4, 5, '/upload/winner/1.jpg', '嘟嘟', 'http://tp4.sinaimg.cn/2139885703/180/40003422142/1', '13233232', 'iPad Air 32G Wifi版', '/upload/winner/2.jpg'),
(5, 3, '/upload/winner/52f5071f1e3c1_1391789855.jpg', 'd3', 'f', '3', '3', '/upload/winner/52f5072135b54_1391789857.jpg'),
(6, 3, '/upload/winner/52f509aa00936_1391790506.jpg', '333', '333', '333', '333', '/upload/winner/52f509abd55bd_1391790507.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
