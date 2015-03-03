-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Tem 2014, 11:21:09
-- Sunucu sürümü: 5.6.12-log
-- PHP Sürümü: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `kolaykolej`
--
CREATE DATABASE IF NOT EXISTS `kolaykolej` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kolaykolej`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blood_group`
--

CREATE TABLE IF NOT EXISTS `blood_group` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blood_group`
--

INSERT INTO `blood_group` (`id`, `name`) VALUES
(1, 'AB+'),
(2, 'AB-'),
(3, 'A+'),
(4, 'A-'),
(5, 'B+'),
(6, 'B-'),
(7, '0+'),
(8, '0-');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `classroom`
--

INSERT INTO `classroom` (`id`, `name`, `description`) VALUES
(1, '1. Sınıf', NULL),
(2, '2. Sınıf', NULL),
(3, '3. Sınıf', 'Lorem ipsum dolor sit amet, consectetur adipiscing');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Erkek'),
(2, 'Kız');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender_id` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `parents`
--

INSERT INTO `parents` (`id`, `first_name`, `last_name`, `birthday`, `gender_id`, `email`, `address`, `phone`) VALUES
(1, 'Melih', 'Kocatürk', '1981-05-15', 1, 'melih@medianatolia.com', '-', '-'),
(4, 'test', 'test', '1980-10-10', 1, 'test@test.com', '-', '-'),
(5, 'Aylin ', 'Taşıyan ', '1951-02-19', 1, 'aylintasi@v.com', '', '5332333333');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parents_to_student`
--

CREATE TABLE IF NOT EXISTS `parents_to_student` (
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `parents_to_student`
--

INSERT INTO `parents_to_student` (`parent_id`, `student_id`) VALUES
(4, 8),
(1, 16),
(1, 9),
(5, 17);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender_id` tinyint(1) NOT NULL,
  `blood_group_id` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `classroom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`id`, `student_id`, `first_name`, `last_name`, `birthday`, `gender_id`, `blood_group_id`, `email`, `address`, `phone`, `classroom_id`) VALUES
(8, 1, 'Melih', 'Kocatürk', '1981-05-15', 1, 7, 'melihkocaturk@gmail.com', 'Yahşibey Mh.', '5466941981', 1),
(9, 2, 'Nazan', 'Türkay', '1990-01-01', 2, 1, 'nazan@medianatolia.com', 'Zafer Mh.', '-', 2),
(16, 3, 'Utku', 'Kaynar', '1980-01-01', 1, 4, 'utku@medianatolia.com', '-', '-', 1),
(17, 11, 'Hakan', 'Taşıyan', '1979-02-19', 1, 3, 'utkukaynar@gmail.com', 'dşsafklsdjşlfk', '5412809556', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`) VALUES
(3, 'Kimya', ''),
(2, 'Matematik', 'bla bla');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subject_to_teacher`
--

CREATE TABLE IF NOT EXISTS `subject_to_teacher` (
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `subject_to_teacher`
--

INSERT INTO `subject_to_teacher` (`subject_id`, `teacher_id`) VALUES
(2, 3),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender_id` tinyint(1) NOT NULL,
  `blood_group_id` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `classroom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `birthday`, `gender_id`, `blood_group_id`, `email`, `address`, `phone`, `classroom_id`) VALUES
(1, 'Canan', 'Abla', '1980-01-01', 2, 7, 'canan@medianatolia.com', '-', '-', 1),
(3, 'Ali', 'Veli', '1980-10-10', 1, 7, 'ali@veli.com', '-', '-', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teacher_to_classroom`
--

CREATE TABLE IF NOT EXISTS `teacher_to_classroom` (
  `teacher_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `user_group_id`, `username`, `password`, `first_name`, `last_name`, `email`, `status`) VALUES
(1, 1, 'melih', 'e10adc3949ba59abbe56e057f20f883e', 'Melih', 'Kocatürk', 'melih@medianatolia.com', 1),
(2, 3, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'test', 'test123', 'test@test.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `permission` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `permission`) VALUES
(1, 'Yönetici', 'a:7:{i:0;s:9:"classroom";i:1;s:7:"parents";i:2;s:7:"student";i:3;s:7:"subject";i:4;s:7:"teacher";i:5;s:4:"user";i:6;s:9:"usergroup";}'),
(2, 'Öperatör', 'a:4:{i:0;s:9:"classroom";i:1;s:7:"parents";i:2;s:7:"student";i:3;s:7:"teacher";}'),
(3, 'Test', 'a:3:{i:0;s:7:"parents";i:1;s:7:"student";i:2;s:7:"teacher";}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
