-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2008 年 08 月 21 日 18:19
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `webim`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `im_user`;
CREATE TABLE IF NOT EXISTS `im_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userface` varchar(255) default 'default.gif',
  `usersign` varchar(255) NOT NULL default '没有哦',
  `userstatus` int(11) NOT NULL default '7',
  `lastonlinetime` datetime NOT NULL,
  `usergender` tinyint(4) NOT NULL,
  `userpower` tinyint(4) NOT NULL default '2',
  `syscode` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- 表的结构 `userconfig`
--

DROP TABLE IF EXISTS `im_userconfig`;
CREATE TABLE IF NOT EXISTS `im_userconfig` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `distype` tinyint(4) NOT NULL default '1',
  `ordertype` tinyint(4) NOT NULL default '1',
  `chatside` tinyint(4) NOT NULL default '1',
  `msgsendkey` tinyint(4) NOT NULL default '1',
  `showfocus` tinyint(4) NOT NULL default '2',
  `msgshowtime` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- 表的结构 `userfriend`
--

DROP TABLE IF EXISTS `im_userfriend`;
CREATE TABLE IF NOT EXISTS `im_userfriend` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `friendid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL default '1',
  `customname` varchar(255) default NULL,
  `isblocked` tinyint(4) NOT NULL default '2',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- 表的结构 `usergroup`
--

DROP TABLE IF EXISTS `im_usergroup`;
CREATE TABLE IF NOT EXISTS `im_usergroup` (
  `id` int(11) NOT NULL auto_increment,
  `groupname` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `usermsg`
--

DROP TABLE IF EXISTS `im_usermsg`;
CREATE TABLE IF NOT EXISTS `im_usermsg` (
  `id` int(11) NOT NULL auto_increment,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `msgcontent` text NOT NULL,
  `isconfirm` tinyint(4) NOT NULL default '2',
  `typeid` tinyint(4) NOT NULL default '1',
  `msgaddtime` datetime NOT NULL,
  `isread` tinyint(4) NOT NULL default '2',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- 表的结构 `usernum`
--

DROP TABLE IF EXISTS `im_usernum`;
CREATE TABLE IF NOT EXISTS `im_usernum` (
  `id` int(11) NOT NULL auto_increment,
  `num` int(11) NOT NULL,
  `isok` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001 ;

-- --------------------------------------------------------

--
-- 表的结构 `usersysmsg`
--

DROP TABLE IF EXISTS `im_usersysmsg`;
CREATE TABLE IF NOT EXISTS `im_usersysmsg` (
  `id` int(11) NOT NULL auto_increment,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `msgcontent` text NOT NULL,
  `isconfirm` tinyint(4) NOT NULL default '2',
  `typeid` tinyint(4) NOT NULL default '1',
  `msgaddtime` datetime NOT NULL,
  `isread` tinyint(4) NOT NULL default '2',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;
