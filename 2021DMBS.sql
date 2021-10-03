-- DBMS 期末PROJECT
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- 醫生
CREATE TABLE `醫生` (
  `醫生ID` int(5) NOT NULL,
  `醫生名字` varchar(15) NOT NULL,
  `所屬科別` varchar(15) NOT NULL,
  `薪資` int(10) NOT NULL,
  `醫院ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `醫生` (`醫生ID`, `醫生名字`, `所屬科別`, `薪資`, `醫院ID`) VALUES
(1, 'Jack', '心臟科', 300000, 1),
(2, 'Judy', '外科', 700000, 5),
(3, 'Peter', '骨科', 270000, 6),
(4, 'John', '腦科', 313000, 8),
(5, 'Bill', '眼科', 310000, 9),
(6, 'Eason', '整形外科', 460000, 10),
(7, 'Eric', '內科', 268885, 2),
(8, 'Harry', '家醫科', 250000, 3),
(9, 'Mary', '牙科', 500000, 4),
(10, 'Bob', '復健科', 298250, 7);


-- 處方簽 
CREATE TABLE `處方簽` (
  `處方簽ID` int(5) NOT NULL,
  `處方名字` varchar(15) NOT NULL,
  `過期日` varchar(15) NOT NULL,
  `處方價格` int(5) NOT NULL,
  `開藥醫師ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `處方簽` (`處方簽ID`, `處方名字`, `過期日`, `處方價格`, `開藥醫師ID`) VALUES
(1, 'A處方', '5/23', 350, 7),
(2, 'B處方', '6/8', 600, 3),
(3, 'C處方', '7/30', 200, 1),
(4, 'D處方', '5/5', 1000, 2),
(5, 'E處方', '8/7', 240, 8),
(6, 'F處方', '9/9', 500, 10),
(7, 'G處方', '5/7', 600, 9),
(8, 'H處方', '8/1', 1000, 5),
(9, 'I處方', '6/2', 3000, 6),
(10, 'J處方', '12/12', 5000, 4),
(11, '綜合處方1', '7/12', 1000, 2),
(12, '綜合處方2', '5/14', 6000, 9),
(13, '綜合處方3', '3/31', 4000, 7);

-- 病人
CREATE TABLE `病人` (
  `病人ID` int(5) NOT NULL,
  `病人名字` varchar(15) NOT NULL,
  `年紀` int(5) NOT NULL,
  `身高` int(5) NOT NULL,
  `體重` int(5) NOT NULL,
  `醫師ID` int(5) NOT NULL,
  `處方簽ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `病人` (`病人ID`, `病人名字`, `年紀`, `身高`, `體重`, `醫師ID`, `處方簽ID`) VALUES
(1, 'Bryan', 23, 173, 66, 9, 2),
(2, 'Basil', 19, 170, 64, 1, 6),
(3, 'Cary', 42, 164, 60, 8, 5),
(4, 'Mort', 12, 176, 69, 7, 10),
(5, 'Luke', 23, 180, 78, 3, 3),
(6, 'Giles', 34, 175, 70, 10, 7),
(7, 'Danny', 36, 177, 69, 1, 8),
(8, 'Duke', 76, 159, 50, 4, 3),
(9, 'Edgar', 65, 168, 57, 6, 4),
(10, 'Edward', 88, 166, 55, 5, 1),
(11, 'Eamonn', 12, 159, 50, 4, 9),
(12, 'Desmond', 23, 167, 65, 2, 6);

-- 醫院

CREATE TABLE `醫院` (
  `醫院ID` int(5) NOT NULL,
  `科別數量` int(5) NOT NULL,
  `地點` varchar(15) NOT NULL,
  `醫院簡稱` varchar(15) NOT NULL,
  `創立基金會ID` int(5) NOT NULL,
  `管理基金會ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `醫院` (`醫院ID`, `科別數量`, `地點`, `醫院簡稱`, `創立基金會ID`, `管理基金會ID`) VALUES
(1, 6, '嘉義', 'A', 6, 8),
(2, 7, '台南', 'B', 3, 7),
(3, 5, '彰化', 'C', 10, 3),
(4, 8, '新竹', 'D', 5, 6),
(5, 9, '花蓮', 'E', 2, 8),
(6, 6, '高雄', 'F', 4, 7),
(7, 10, '桃園', 'G', 8, 9),
(8, 12, '台北', 'H', 9, 1),
(9, 11, '新北', 'I', 7, 2),
(10, 9, '台中', 'J', 1, 4),
(11, 8, '台中', 'K', 4, 5),
(12, 5, '台南', 'L', 5, 5),
(13, 7, '台北', 'M', 2, 8),
(14, 10, '台中', 'N', 4, 9),
(15, 17, '台中', 'O', 7, 5),
(16, 14, '台北', 'P', 9, 10),
(17, 6, '台南', 'Q', 8, 8);

-- 基金會
CREATE TABLE `基金會` (
  `基金會ID` int(5) NOT NULL,
  `資產` int(15) NOT NULL,
  `基金會簡稱` varchar(15) NOT NULL,
  `董事長` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `基金會` (`基金會ID`, `資產`, `基金會簡稱`, `董事長`) VALUES
(1, 250000000, 'QWE', 'Tim'),
(2, 350000000, 'ABC', 'Troy'),
(3, 500000000, 'DCB', 'Theo'),
(4, 870000000, 'QTI', 'Tony'),
(5, 900000000, 'OYT', 'Seb'),
(6, 310000000, 'TYR', 'Will'),
(7, 660000000, 'POI', 'Simon'),
(8, 450000000, 'LKJ', 'Tony'),
(9, 370000000, 'FTP', 'Solomon'),
(10, 670000000, 'FGH', 'Terry');


ALTER TABLE `醫生`
  ADD PRIMARY KEY (`醫生ID`),
  ADD KEY `FK1` (`醫院ID`);

ALTER TABLE `處方簽`
  ADD PRIMARY KEY (`處方簽ID`),
  ADD KEY `FK2` (`開藥醫師ID`);

ALTER TABLE `病人`
  ADD PRIMARY KEY (`病人ID`),
  ADD KEY `FK3` (`醫師ID`),
  ADD KEY `FK4` (`處方簽ID`);

ALTER TABLE `醫院`
  ADD PRIMARY KEY (`醫院ID`),
  ADD KEY `FK5` (`創立基金會ID`),
  ADD KEY `FK6` (`管理基金會ID`);

ALTER TABLE `基金會`
  ADD PRIMARY KEY (`基金會ID`);



ALTER TABLE `醫生`
  ADD CONSTRAINT `cFK1` FOREIGN KEY (`醫院ID`) REFERENCES `醫院` (`醫院ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `處方簽`
  ADD CONSTRAINT `cFK2` FOREIGN KEY (`開藥醫師ID`) REFERENCES `醫生` (`醫生ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `病人`
  ADD CONSTRAINT `cFK3` FOREIGN KEY (`醫師ID`) REFERENCES `醫生` (`醫生ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cFK4` FOREIGN KEY (`處方簽ID`) REFERENCES `處方簽` (`處方簽ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `醫院`
  ADD CONSTRAINT `cFK5` FOREIGN KEY (`創立基金會ID`) REFERENCES `基金會` (`基金會ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cFK6` FOREIGN KEY (`管理基金會ID`) REFERENCES `基金會` (`基金會ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

COMMIT;
