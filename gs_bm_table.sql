-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 05 日 13:15
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `objects`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `category` varchar(24) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(64) DEFAULT NULL,
  `check1` date DEFAULT NULL,
  `control_num` int(24) DEFAULT NULL,
  `amortization_period` int(3) DEFAULT NULL,
  `acquisition_cost` int(24) DEFAULT NULL,
  `residual_value` int(24) DEFAULT NULL,
  `others` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `category`, `date`, `place`, `check1`, `control_num`, `amortization_period`, `acquisition_cost`, `residual_value`, `others`) VALUES
(1, 'パソコン', '電気機器', '2023-01-02', '机上', '2024-01-02', 0, 0, 0, 0, ''),
(2, 'ウラカン', '車両運搬具', '2024-01-02', '自宅', '2024-01-02', 0, 0, 0, 0, ''),
(3, 'カメラ', '映像機器', '2022-12-18', '自宅', '2024-01-02', 0, 0, 0, 0, ''),
(4, 'くまモン', '着ぐるみ', '2022-12-18', '不明', '2023-01-02', 0, 0, 0, 0, ''),
(5, 'カメラ', '映像機器', '2022-12-25', 'キャビネット', '2023-12-25', 0, 0, 0, 0, ''),
(7, '夏目漱石', '人間', '1987-12-29', '熊本', '2023-12-29', 0, 0, 0, 0, ''),
(8, 'マイバッハ', '車両運搬具', '2022-12-27', '地下', '2023-12-27', 0, 0, 0, 0, ''),
(11, 'mac', 'pc', '2023-01-03', '自宅', '2024-01-03', 12, 3, 176000, 1, ''),
(12, 'iPhone12', '通信機器', '2023-01-05', 'ポッケ', '2024-01-05', 123, 3, 100000, 20, ''),
(13, 'タンブラー', '消耗品', '2023-01-05', '机上', '2024-01-05', 124, 1, 2000, 0, ''),
(14, 'aa', '車両運搬具', '2023-01-05', '自宅', '2023-01-07', 1, 1, 1, 1, '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
