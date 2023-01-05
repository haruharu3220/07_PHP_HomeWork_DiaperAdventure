-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 05 日 15:19
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `DiaperAdventure`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Choices`
--

CREATE TABLE `Choices` (
  `choicesID` int(11) NOT NULL,
  `questionNo` int(11) NOT NULL,
  `choicesNo` int(11) NOT NULL,
  `choicesContent` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `Choices`
--

INSERT INTO `Choices` (`choicesID`, `questionNo`, `choicesNo`, `choicesContent`) VALUES
(1, 1, 1, '５月１０日'),
(2, 1, 2, '６月１０日'),
(3, 1, 3, '７月１０日'),
(4, 2, 1, 'コートf MD軟膏'),
(5, 2, 2, 'オロナイン'),
(6, 2, 3, 'リンデロン'),
(7, 3, 1, '納豆かけご飯'),
(8, 3, 2, '卵焼き'),
(9, 3, 3, '塩サバ'),
(22, 1, 1, 's'),
(23, 1, 1, 'S'),
(24, 1, 2, 'D'),
(25, 1, 1, 'S'),
(26, 1, 2, 'D'),
(27, 1, 1, 'a'),
(28, 1, 2, 's'),
(29, 1, 1, 'ss'),
(30, 1, 2, 'dd'),
(31, 1, 1, 'ss'),
(32, 1, 2, 'dd'),
(33, 1, 1, 'ss'),
(34, 1, 2, 'dd'),
(35, 1, 1, 'ss'),
(36, 1, 2, 'dd'),
(37, 1, 1, 'ss'),
(38, 1, 2, 'dd'),
(39, 1, 1, 'ss'),
(40, 1, 2, 'dd'),
(41, 1, 1, 'ss'),
(42, 1, 2, 'dd'),
(43, 1, 1, 'ss'),
(44, 1, 2, 'dd'),
(45, 1, 1, 'ねこ'),
(46, 1, 2, '犬');

-- --------------------------------------------------------

--
-- テーブルの構造 `Correct`
--

CREATE TABLE `Correct` (
  `cID` int(11) NOT NULL,
  `qNo` int(11) NOT NULL,
  `cNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `Correct`
--

INSERT INTO `Correct` (`cID`, `qNo`, `cNo`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 0),
(4, 1, 2),
(5, 1, 2),
(6, 1, 2),
(7, 1, 2),
(8, 1, 2),
(9, 1, 2),
(10, 1, 2),
(11, 1, 2),
(12, 1, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `Diaper`
--

CREATE TABLE `Diaper` (
  `DiaperID` int(11) NOT NULL,
  `diaperName` char(60) NOT NULL,
  `absorbency` int(11) NOT NULL DEFAULT 100,
  `favoriteFlag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `Diaper`
--

INSERT INTO `Diaper` (`DiaperID`, `diaperName`, `absorbency`, `favoriteFlag`) VALUES
(1, 'パンパース', 100, 0),
(3, 'メリーズ', 100, 0),
(4, 'グーン', 100, 0),
(5, 'ナチュラルムーニー', 100, 0),
(6, 'ムーニーマン', 100, 0),
(7, 'マミーポコ', 100, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `Question`
--

CREATE TABLE `Question` (
  `qID` int(11) NOT NULL,
  `questionNo` int(11) NOT NULL,
  `qContent` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `Question`
--

INSERT INTO `Question` (`qID`, `questionNo`, `qContent`) VALUES
(1, 1, 'はるあの誕生日は？'),
(2, 2, '愛用の軟膏は？'),
(3, 3, '好きな食べ物は？'),
(5, 1, 'aaa'),
(6, 1, 'zz'),
(7, 1, 'oo'),
(8, 3, 'tt'),
(9, 3, '嗚呼あ'),
(10, 3, 'y'),
(11, 3, '問題'),
(12, 3, '問題'),
(13, 3, '問題'),
(14, 3, '問題'),
(15, 3, '1'),
(16, 3, 'a'),
(17, 3, 'A'),
(18, 3, 'A'),
(19, 3, '問題'),
(20, 3, '問題'),
(21, 3, 'aa'),
(22, 3, 'aa'),
(23, 3, 'aa'),
(24, 3, 'aa'),
(25, 3, 'aa'),
(26, 3, 'aa'),
(27, 3, 'aa'),
(28, 3, 'はるあのチョコは');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `Choices`
--
ALTER TABLE `Choices`
  ADD PRIMARY KEY (`choicesID`);

--
-- テーブルのインデックス `Correct`
--
ALTER TABLE `Correct`
  ADD PRIMARY KEY (`cID`);

--
-- テーブルのインデックス `Diaper`
--
ALTER TABLE `Diaper`
  ADD PRIMARY KEY (`DiaperID`);

--
-- テーブルのインデックス `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`qID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `Choices`
--
ALTER TABLE `Choices`
  MODIFY `choicesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- テーブルの AUTO_INCREMENT `Correct`
--
ALTER TABLE `Correct`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `Diaper`
--
ALTER TABLE `Diaper`
  MODIFY `DiaperID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `Question`
--
ALTER TABLE `Question`
  MODIFY `qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
