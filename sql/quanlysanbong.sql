-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 04:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlysanbong`
--

-- --------------------------------------------------------

--
-- Table structure for table `dat_san`
--

CREATE TABLE `dat_san` (
  `id` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_san` int(11) NOT NULL,
  `bat_dau` datetime NOT NULL,
  `ket_thuc` datetime NOT NULL,
  `da_thanh_toan` tinyint(1) NOT NULL,
  `don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `dat_san`
--

INSERT INTO `dat_san` (`id`, `ma_kh`, `ma_san`, `bat_dau`, `ket_thuc`, `da_thanh_toan`, `don_gia`) VALUES
(206, 30, 1, '2024-01-02 05:00:00', '2024-01-02 07:00:00', 1, 3000),
(215, 30, 1, '2024-01-06 05:00:00', '2024-01-06 10:15:00', 0, 3000),
(216, 2, 5, '2024-01-04 05:00:00', '2024-01-04 05:15:00', 0, 3000),
(218, 1, 1, '2024-01-05 05:00:00', '2024-01-05 07:00:00', 0, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(40) NOT NULL,
  `sdt` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `sdt`) VALUES
(1, 'Huynh Huu Hieu', '0123456789'),
(2, 'Dang Kim Bac', '0123312892'),
(28, 'Le Duc Nhuan', '0912312312'),
(29, 'Huynh Gia Baoo', '0129319231'),
(30, 'Ha Minh Chien', '0912491259'),
(31, 'Truong Vu Huy', '0123912301'),
(34, 'Huynh Tran Tuấn Anh', '0192392042');

-- --------------------------------------------------------

--
-- Table structure for table `san_bong`
--

CREATE TABLE `san_bong` (
  `id` int(11) NOT NULL,
  `ten` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `san_bong`
--

INSERT INTO `san_bong` (`id`, `ten`) VALUES
(1, 'Sân 1'),
(2, 'Sân 2'),
(3, 'Sân 3'),
(4, 'Sân 4'),
(5, 'Sân 5'),
(6, 'Sân 6');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `hoten_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phone_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `username`, `password`, `hoten_user`, `email_user`, `phone_user`) VALUES
(12, 'test1', '123456', 'Hữu Hiếu', 'test1@gmail.com', 2147483647),
(13, 'test2', '123123', 'Chiến', 'chien@gmail.com', 912969120),
(15, 'user', '123456', 'Huỳnh Hữu Hiếu', 'hhieu02092002@gmail.com', 912969120);

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `anh_dai_dien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tin_tuc`
--

INSERT INTO `tin_tuc` (`id`, `tieu_de`, `mo_ta`, `noi_dung`, `ngay_dang`, `anh_dai_dien`) VALUES
(7, 'Sôi động giải bóng đá học sinh – sinh viên mở rộng tranh cúp TVU năm 2022 ', 'Sáng ngày 08/05, giải bóng đá học sinh – sinh viên mở rộng tranh cúp TVU năm 2022 do Trường Đại học Trà Vinh tổ chức chính thức được khai mạc, nhằm thiết thực chào mừng kỷ niệm 47 năm Ngày Giải phóng miền Nam, thống nhất đất nước và 136 năm Ngày Quốc tế Lao động.', 'Giải bóng đá đấu bắt đầu từ ngày 08/5 và kết thúc vào ngày 05/6/2022, có 15 đội tham gia gồm: Trường THPT Bình Minh, THPT Võ Văn Kiệt, THPT Tam Bình tỉnh Vĩnh Long; Trường THPT Lê Quý Đôn, THPT Chê Ghê-Va Ra tỉnh Bến Tre; Trường Thực hành Sư phạm, Khoa Răng – Hàm – Mặt, Khoa Kinh tế – Luật, Khoa Nông nghiệp-Thủy sản, Khoa Y – Dược, Khoa Sư phạm, Khoa QLNN-QTVP, Khoa Kỹ thuật Công nghệ, Khoa Ngoại ngữ, Khoa NN-VH-NT Khmer Nam Bộ. Thu hút hơn 800 cổ động viên đến từ các trường THPT và Trường ĐH Trà Vinh.\r\nTại lễ khai mạc, ông Nguyễn Văn Vũ An, Bí thư Đoàn trường Đại học Trà Vinh, Trưởng Ban tổ chức nói: “Đây là hoạt động thiết thực nhằm nâng cao tinh thần đoàn kết, góp phần thúc đẩy phong trào luyện tập thể dục thể thao trong học sinh – sinh viên. Ngoài ra, thông qua hoạt động này cũng giúp cho các bạn học sinh ở các trường THPT có được những  trải nghiệp các hoạt động thực tế, thú vị tại Trường Đại học Trà Vinh. Giải bóng đá học sinh – sinh viên mở rộng hôm nay nằm trong khuôn khổ các chuỗi hoạt động giao lưu, gắn kết giữa học sinh THPT và sinh viên TVU”.\r\n\r\n“Ban tổ chức tin rằng giải đấu sẽ mang lại không khí vui tươi, sôi nổi, tạo sự gắn bó giữa Trường Đại học Trà Vinh và các Trường THPT trong khu vực” Ông Nguyên Văn Vũ An chia sẻ.\r\nThi đấu ngày khai mạc, các vận động viên Trường THPT Bình Minh, THPT Võ Văn Kiệt, THPT Tam Bình tỉnh Vĩnh Long; Trường THPT Lê Quý Đôn, THPT Chê Ghê-Va Ra tỉnh Bến Tre; Trường Thực hành Sư phạm, Khoa Răng – Hàm – Mặt, Khoa Kinh tế – Luật, Khoa Nông nghiệp-Thủy sản, Khoa Y – Dược, Khoa Sư phạm, Khoa QLNN-QTVP, Khoa Kỹ thuật Công nghệ, Khoa Ngoại ngữ, Khoa NN-VH-NT Khmer Nam Bộ, hứa hẹn các trận đấu rất hấp dẫn.', '2023-12-31 06:57:36', 'images/tintuctvu2.jpg'),
(12, 'Tổng kết giải bóng đá Trường Đại học Trà Vinh mở rộng', 'Sáng ngày 27/5, Đoàn trường Trường Đại học Trà Vinh tổ chức lễ tổng kết, trao giải Giải bóng đá học sinh, sinh viên mở rộng, tranh cúp TVU năm 2022. Giải diễn ra từ ngày 06- 27/5.', 'Tham gia giải bóng đá học sinh, sinh viên mở rộng, tranh cúp TVU năm 2022 có 15 đội bóng đến từ 10 đơn vị Đoàn cơ sở, thuộc Đoàn trường Trường Đại học Trà Vinh và 05 đội khách mời đến từ các trường THPT: Võ Văn Kiệt, Bình Minh, Tam Bình (tỉnh Vĩnh Long), Lê Quý Đôn và Chê Ghêvara (tỉnh Bến Tre).\r\n\r\nKết quả, giải Nhất Đoàn khoa Kỹ thuật – Công nghệ, giải Nhì Đoàn Khoa Kinh tế – Luật và giải Ba được trao cho Đoàn khoa Sư phạm, Trường Đại học Trà Vinh; Trường THPT Tam Bình (Vĩnh Long) đoạt giải Khuyến khích. Ngoài ra, Ban tổ chức giải còn trao các danh hiệu cá nhân cho thủ môn xuất sắc và cầu thủ ghi bàn nhiều nhất giải…\r\n\r\nDịp này, Đoàn trường Trường Đại học Trà Vinh tổ chức giao lưu với nữ tuyển thủ bóng đá Huỳnh Như, Đội trưởng Đội tuyển bóng đá nữ Việt Nam, người con của quê hương Trà Vinh vừa xuất sắc cùng đồng đội đoạt Huy chương Vàng SEA Games 31. Buổi giao lưu diễn ra trong không khí cởi mở, vui tươi và dâng tràn niềm tự hào dân tộc.', '2024-01-03 08:27:24', 'images/tintuctvu3.jpg'),
(13, 'Bế mạc Hội thao chào mừng kỷ niệm 41 năm ngày Nhà giáo Việt Nam ( 20/11/1982 – 20/11/2023 )', '(TVU)– Sáng ngày 18/11, tại sân bóng Trường Đại học Trà Vinh tổ chức lễ Bế mạc Hội thao chào mừng kỷ niệm 41 năm ngày Nhà giáo Việt Nam (20/11/1982 – 20/11/2023); chào mừng Lễ khai giảng năm học 2023 – 2024, tiến tới chào mừng Đại hội Đại biểu toàn quốc Hội Sinh viên Việt Nam lần thứ XI, nhiệm kỳ 2023 – 2028.', 'Đến tham dự buổi lễ, về phía đơn vị tài trợ có Anh Ngô Hồng Khanh – Trưởng phòng Kinh doanh Viettel, về phía Trường Đại học Trà Vinh có Đồng chí Phạm Lê Phương Thảo – Bí thư Đoàn trường – Trưởng Ban Tổ chức; Đồng chí Cao Thanh Tâm – Phó Chủ tịch Thường trực Hội sinh viên Trường; Đồng chí Nguyễn Đình Chiểu – Phó Chủ tịch Hội sinh viên Trường; Đồng chí Nguyễn Minh Hiền – Uỷ viên Thường vụ Đoàn trường; Đồng chí Lâm Văn Phương – Uỷ viên Thường vụ Đoàn trường – Phó Trưởng Ban Tổ chức; thầy Nguyễn Văn Chính – GV BM GDTC – Tổ trưởng Tổ Trọng tài cùng các VĐV là học sinh, sinh viên đến tham gia và cổ vũ.\r\n\r\nHội thao năm nay thu hút 19 đội bóng chuyền nam, nữ; 21 đội bóng đá nam, nữ . Thi đấu từ ngày 28/10 đến ngày 18/11. \r\nPhát biểu tổng kết bế mạc, Đồng chí Phạm Lê Phương Thảo cho biết : Sau 1 tháng thi đấu với tinh thần nhiệt huyết, cao thượng, trung thực và đoàn kết các đội bóng đã cống hiến cho khán giả những bàn thắng đẹp, những pha bóng kĩ thuật làm nức lòng người hâm mộ. Có những nụ cười của niềm vui cũng có những giọt nước mắt của sự nuối tiếc. Hơn tất cả là giải đấu đã mang lại một sân chơi lành mạnh, bổ ích và tạo cơ hội giao lưu học hỏi lẫn nhau; nâng cao tinh thần đoàn kết giữa các đơn vị. Qua đó, Đồng chí Phạm Lê Phương Thảo đại diện cho Ban Tổ chức gửi lời cảm ơn đến các đơn vị tài trợ, các cổ động viên ủng hộ tinh thần cho các vận động viên, giúp họ vượt qua thử thách và thể hiện tốt nhất khả năng của mình. ', '2024-01-03 08:47:47', 'images/tintuctvu4.jpg'),
(16, 'Giải bóng đá sinh viên TVU League 2020, môi trường giao lưu và rèn luyện sức khoẻ của sinh viên.', 'Giải bóng đá sinh viên TVU League 2020, môi trường giao lưu và rèn luyện sức khoẻ của sinh viên.', 'Trận chung kết trao giải cùng với sự tham dự của PGS.TS. Phạm Tiết Khánh, Hiệu trưởng trường Đại học Trà Vinh cùng Bà Thạch Thị Dân, Phó Hiệu trưởng Nhà trường và thành viên Hội đồng tư vấn trường. Với tinh thần thể thao nhiệt huyết, đoàn kết và hết mình, 8 đội bóng đã mang đến cho khán giả 28 trận đấu đẹp mắt với những pha: sút bóng, đánh đầu,…vô cùng điêu luyện. Kết thúc giải đấu, đội của Khoa Kỹ Thuật – Công Nghệ đã xuất sắc giành giải Nhất. Đội đạt giải Nhì và Ba lần lượt được trao cho đội của Khoa Ngoại Ngữ và Khoa Kinh Tế – Luật. Bên cạnh các giải tập thể còn có các giải cá nhân, bao gồm giải cầu thủ xuất sắc nhất, thủ môn xuất sắc nhất và cầu thủ ghi nhiều bàn thắng nhất giải.\r\nTiến sĩ Trương Trí Vũ, thành viên Hội đồng tư vấn trường Đại học Trà Vinh chia sẻ: Sinh hoạt bóng đá hay sinh hoạt thể thao cũng là một trong những thành phần quan trọng của chương trình đào tạo. Sinh viên khi ra trường không phải chỉ cần có kiến thức về học thuật, mà còn phải được đào tạo về nhân cách, tác phong, bóng đá hay tất cả những trò chơi thể thao khác.\r\n\r\nTVU League 2020 là giải bóng dành cho sinh viên dưới sự tài trợ của Quỹ Hỗ trợ Phát triển Kĩ năng mềm và Khởi nghiệp.\r\n\r\nNhan Thành Đốc, được bình chọn là cầu thủ xuất sắc nhất cho biết: Tôi cảm thấy rất vui vì bản thân đã thi đấu hết mình. Khi học tập, chúng ta sẽ gặp nhiều áp lực, những giải đấu như thế này sẽ giải toả áp lực, là dịp để giao lưu học hỏi, rèn luyện, để có sức khoẻ tốt.', '2024-01-04 17:00:00', 'images/tintuctvu5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tk_admin`
--

CREATE TABLE `tk_admin` (
  `id_ad` int(11) NOT NULL,
  `username_ad` varchar(255) NOT NULL,
  `password_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tk_admin`
--

INSERT INTO `tk_admin` (`id_ad`, `username_ad`, `password_ad`) VALUES
(1, 'admin', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_san`
--
ALTER TABLE `dat_san`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dat_san_ibfk_1` (`ma_kh`),
  ADD KEY `dat_san_ibfk_2` (`ma_san`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_bong`
--
ALTER TABLE `san_bong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tk_admin`
--
ALTER TABLE `tk_admin`
  ADD PRIMARY KEY (`id_ad`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dat_san`
--
ALTER TABLE `dat_san`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `san_bong`
--
ALTER TABLE `san_bong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tk_admin`
--
ALTER TABLE `tk_admin`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dat_san`
--
ALTER TABLE `dat_san`
  ADD CONSTRAINT `dat_san_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `dat_san_ibfk_2` FOREIGN KEY (`ma_san`) REFERENCES `san_bong` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
