-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 07 Eki 2024, 11:21:32
-- Sunucu sürümü: 8.2.0
-- PHP Sürümü: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sibervatanctf`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_name` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Web'),
(2, 'OSINT');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `q_id` int NOT NULL AUTO_INCREMENT,
  `q_title` varchar(110) NOT NULL,
  `q_desc` varchar(500) NOT NULL,
  `q_link` text NOT NULL,
  `q_password` text NOT NULL,
  `q_category` int NOT NULL,
  `q_score` int NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `QuestionCategory` (`q_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `question`
--

INSERT INTO `question` (`q_id`, `q_title`, `q_desc`, `q_link`, `q_password`, `q_category`, `q_score`) VALUES
(1, 'XSS', 'XSS bulmak kolay olmalı', '', 'PHPY{asdasdads}', 1, 100),
(2, 'Bul beni', 'Bul beni moruk', '', 'PHPY{sadad13123}', 2, 90),
(3, 'SQL Injection', 'Adam gibi yapın şu sql bağlantılarını', '', 'PHPY{asd}', 1, 150);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `s_webTitle` text NOT NULL,
  `s_motto` text NOT NULL,
  `s_targetTime` datetime NOT NULL,
  `s_instagram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_twitter` text NOT NULL,
  `s_linkedin` text NOT NULL,
  `s_whatsapp` text NOT NULL,
  `s_telegram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`s_webTitle`, `s_motto`, `s_targetTime`, `s_instagram`, `s_twitter`, `s_linkedin`, `s_whatsapp`, `s_telegram`) VALUES
('CTFp', 'Are you ready?', '2024-10-24 16:38:11', 'https://www.instagram.com/', 'https://x.com/home', 'https://www.linkedin.com/in/yavuzkuk/', 'https://www.linkedin.com/in/yavuzkuk/', 'https://telegram.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `solvedquestions`
--

DROP TABLE IF EXISTS `solvedquestions`;
CREATE TABLE IF NOT EXISTS `solvedquestions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_qid` int NOT NULL,
  `s_uid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `QuestionIdCon` (`s_qid`),
  KEY `UserIdCon` (`s_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `solvedquestions`
--

INSERT INTO `solvedquestions` (`id`, `s_qid`, `s_uid`) VALUES
(1, 3, 12),
(2, 3, 8),
(3, 2, 12);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `u_username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `u_password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `u_createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_score` int NOT NULL DEFAULT '0',
  `u_isAdmin` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`u_id`, `u_username`, `u_password`, `u_createdDate`, `u_score`, `u_isAdmin`) VALUES
(4, 'melikad', 'melikadasd', '2024-05-07 17:27:39', 75, 0),
(5, 'zapapy', 'Pa$$w0rd!', '2024-05-07 17:28:07', 100, 0),
(6, 'cyvim', 'Pa$$w0rd!', '2024-05-07 17:31:25', 0, 0),
(7, 'tuseruk', 'Pa$$w0rd!', '2024-05-07 17:31:54', 0, 0),
(8, 'vedava', 'Pa$$w0rd!', '2024-05-07 17:32:18', 0, 0),
(9, 'gucon', 'Pa$$w0rd!', '2024-05-07 17:32:27', 0, 0),
(10, 'mybijejebo', 'Pa$$w0rd!', '2024-05-07 17:40:17', 0, 0),
(11, 'Backf6', 'asd', '2024-05-08 01:39:12', 300, 0),
(12, 'gulde', 'asd', '2024-05-09 01:58:25', 10, 0),
(13, 'admin', 'asd', '2024-05-09 12:26:24', 0, 1),
(15, 'muratbulut', 'asd', '2024-05-10 14:14:50', 0, 0),
(16, 'Yavuzkuk55', 'Yavuzkuk367212', '2024-06-10 12:57:36', 0, 0),
(18, 'yavuzkuk', 'asd', '2024-10-06 18:08:11', 0, 0),
(19, 'alert(1)', 'asd', '2024-10-06 18:11:27', 0, 0),
(25, 'asdfg', 'asd', '2024-10-06 20:04:21', 0, 0),
(26, 'hysogacem', 'Pa$$w0rd!', '2024-10-06 23:25:48', 0, 0),
(27, 'mydanigas', 'Pa$$w0rd!', '2024-10-06 23:28:24', 0, 0),
(28, 'luhyc', 'Pa$$w0rd!', '2024-10-06 23:30:13', 0, 0);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `QuestionCategory` FOREIGN KEY (`q_category`) REFERENCES `category` (`c_id`);

--
-- Tablo kısıtlamaları `solvedquestions`
--
ALTER TABLE `solvedquestions`
  ADD CONSTRAINT `QuestionIdCon` FOREIGN KEY (`s_qid`) REFERENCES `question` (`q_id`),
  ADD CONSTRAINT `UserIdCon` FOREIGN KEY (`s_uid`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
