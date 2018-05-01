-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 09 月 01 日 15:25
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wm`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(90) NOT NULL,
  `password` char(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(240) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `channel`
--

INSERT INTO `channel` (`id`, `name`) VALUES
(1, '热销'),
(2, '折扣'),
(3, '饮品'),
(4, '台式刨冰'),
(5, '甜品'),
(6, '冰沙'),
(7, '凉拌'),
(8, '小吃拼盘');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=703 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `time`, `uid`, `price`) VALUES
(702, 1504250515, 30, 5.00),
(701, 1504249677, 30, 2.00),
(700, 1503564895, 30, 12.00),
(699, 1503563894, 30, 2.00),
(698, 1503388537, 30, 25.00),
(697, 1503388530, 30, 5.00),
(696, 1503373373, 30, 2.00),
(695, 1503373372, 30, 2.00),
(694, 1503373362, 30, 2.00),
(693, 1503299281, 30, 25.00),
(692, 1503294596, 30, 0.00),
(691, 1503294586, 30, 24.00),
(690, 1503293949, 30, 10.00),
(689, 1503288305, 30, 10.00),
(688, 1503282623, 29, 15.00),
(687, 1503234366, 28, 12.00),
(686, 1503234306, 27, 12.00),
(685, 1503234305, 27, 12.00),
(684, 1503234239, 27, 12.00);

-- --------------------------------------------------------

--
-- 表的结构 `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=513 ;

--
-- 转存表中的数据 `order_products`
--

INSERT INTO `order_products` (`id`, `oid`, `pid`, `num`) VALUES
(512, 702, 51, 1),
(511, 701, 52, 1),
(510, 700, 62, 1),
(509, 700, 51, 1),
(508, 700, 52, 1),
(507, 699, 52, 1),
(506, 698, 63, 1),
(505, 698, 62, 1),
(504, 697, 51, 1),
(503, 696, 52, 1),
(502, 695, 52, 1),
(501, 694, 52, 1),
(500, 693, 63, 1),
(499, 693, 62, 1),
(498, 691, 54, 1),
(497, 691, 52, 2),
(496, 691, 62, 0),
(495, 690, 43, 1),
(494, 689, 38, 1),
(493, 689, 45, 1),
(492, 688, 50, 1),
(491, 687, 41, 1),
(490, 686, 41, 1),
(489, 685, 41, 1),
(488, 684, 41, 1);

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `name` char(90) NOT NULL,
  `img` char(210) NOT NULL,
  `price` double(10,2) NOT NULL,
  `liked` int(11) NOT NULL DEFAULT '1',
  `selled` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `cid`, `name`, `img`, `price`, `liked`, `selled`) VALUES
(56, 7, '凉拌粉', '20170821\\90ff1fb272688f4b31e35d926cae4d69.jpg', 20.00, 0, 0),
(57, 7, '凉拌猪皮', '20170821\\ab39e2830880c1009f8c72a7e5281b86.jpg', 20.00, 0, 0),
(47, 4, '芒果冰沙', '20170820\\07a83d804aa2772a95fbc2aba74f918e.png', 15.00, 0, 0),
(54, 8, '套餐1', '20170821\\20559eefa1b39ccd7d92570327353d20.jpg', 20.00, 0, 0),
(52, 1, '热狗', '20170821\\889be65caed62a6d41f41a14303f4f6e.png', 2.00, 0, 0),
(51, 1, '薯片', '20170821\\65ee5445f8d970969950f02732323c34.png', 5.00, 0, 0),
(43, 2, '煎饺', '20170817\\fde06803789dc68ef9c72a907b214f7f.png', 10.00, 0, 0),
(48, 5, '水果蛋糕', '20170820\\4ea795e2669397ceeb8c131e5fa7d7f1.png', 50.00, 0, 0),
(53, 6, '水果冰沙', '20170821\\979b04ffa903cc38ab5d037dc9478ce7.jpg', 15.00, 0, 0),
(38, 3, '加多宝', '20170816\\0e7ac80797a6b2ea96a1adaad66f26c9.png', 5.00, 0, 0),
(66, 8, '套餐4', '20170821\\a2dda9755755ed00634e753513a3d9b2.png', 18.00, 0, 0),
(65, 8, '套餐3', '20170821\\d2a1d3c02f19162d73d803324b4bb4bc.jpg', 20.00, 0, 0),
(55, 8, '套餐2', '20170821\\4e34f6859b8b65eff1e6458d06a7f711.png', 15.00, 0, 0),
(60, 3, '可乐', '20170821\\8d495a17a6dc6ae0a79f00c063384efa.jpg', 3.00, 0, 0),
(61, 3, '冰红茶', '20170821\\99f7c9e3508dcb0fda27a3cd062f6650.jpg', 4.00, 0, 0),
(62, 1, '+C', '20170821\\6fe8286cf3bef53d0eb53fb0685b6005.jpg', 5.00, 0, 0),
(64, 2, '饺子', '20170821\\3c3f55953b7e115528d2eb4ccb6e7de5.jpg', 10.00, 0, 0),
(63, 1, '芒果冰沙', '20170821\\9687b6906e20a157ea4932b11460385c.png', 20.00, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(90) NOT NULL,
  `password` char(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(30, '123', '1'),
(29, '小华', '123'),
(28, '小明', '1'),
(27, '耿', '12');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usernames` char(90) NOT NULL,
  `passwords` char(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `usernames`, `passwords`) VALUES
(1, '17875511941', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
