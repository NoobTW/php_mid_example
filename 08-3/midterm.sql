-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 04 月 23 日 15:54
-- 伺服器版本: 10.0.29-MariaDB-0ubuntu0.16.10.1
-- PHP 版本： 7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `midterm`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dorm`
--

CREATE TABLE `dorm` (
  `did` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `dorm` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `applydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `dorm`
--

INSERT INTO `dorm` (`did`, `uid`, `name`, `gender`, `email`, `dorm`, `checkin`, `checkout`, `applydate`) VALUES
(3, 'kangaroo', 'e', 'male', 'ewfa@ewf.c', '["dorm2","dormnuk"]', '2017-04-10', '2017-04-13', '2017-04-23 15:33:46'),
(5, 'kangaroo', 'eeeee', 'female', 'eewfefwefwef@lfalsf.cdscewcew', '["dorm2","dorm0","dormnuk"]', '2017-03-30', '2017-05-05', '2017-04-23 15:52:44');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userid`, `password`, `type`) VALUES
('admin', 'I_@m_Adm!n', 1),
('kangaroo', 'giraffe', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `dorm`
--
ALTER TABLE `dorm`
  ADD PRIMARY KEY (`did`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `dorm`
--
ALTER TABLE `dorm`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
