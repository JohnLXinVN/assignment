-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 12:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Y Tế'),
(3, 'Giáo Dục'),
(7, 'Kinh Tế'),
(8, 'Văn Hóa'),
(9, 'Đời sống');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `excerpt` text,
  `content` text,
  `luot_xem` int DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `category_id` int NOT NULL,
  `tac_gia` varchar(255) DEFAULT NULL,
  `ngay_xuat_ban` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `content`, `luot_xem`, `image`, `category_id`, `tac_gia`, `ngay_xuat_ban`) VALUES
(13, 'Luật kinh tế ngành học ra trường không sợ… ngồi không', 'Nếu bạn thuộc về team thích và giỏi tư duy theo kiểu lập luận và phân tích, khả năng cao là bạn rất phù hợp với nghề Luật. Trong nội dung bài viết dưới đây sẽ lần lượt giới thiệu ngành Luật kinh tế, tố chất phù hợp và cả cơ hội việc làm của ngành học này.', 'Giống như sinh viên ngành luật, các bạn theo học ngành Luật kinh tế sẽ được trang bị kiến thức tổng hợp chuyên sâu về kinh tế, pháp luật nói chung bên cạnh các kiến thức cơ bản về marketing, quản trị và tài chính.\r\n\r\nNội dung chương trình đào tạo giúp sinh viên có khả năng hiểu và nắm chắc kiến thức về pháp luật trong kinh doanh như: Pháp luật doanh nghiệp, pháp luật sở hữu trí tuệ, pháp luật thương mại, pháp luật về cạnh tranh, độc quyền, pháp luật về thủ tục đăng ký doanh nghiệp, Pháp luật về hợp đồng…\r\n\r\nNgoài ra, các sinh viên còn được trang bị kỹ năng hành nghề luật, kỹ năng đàm phán, ra quyết định, soạn thảo hợp đồng, văn bản. Có khả năng nghiên cứu và xử lý tốt những vấn đề pháp lý đặt ra trong thực tiễn hoạt động kinh doanh của doanh nghiệp, quản lý nhà nước đối với doanh nghiệp.\r\n\r\nTại Trường Đại học Quốc tế Hồng Bàng (HIU) sinh viên còn được bồi dưỡng kỹ năng thực hành và giao tiếp tiếng Anh thông qua các môn học song song ngữ Việt – Anh và câu lạc bộ đội nhóm.\r\n\r\nNội dung chương trình đào tạo ngành Luật của Trường Đại học Quốc tế Hồng Bàng được thiết kế có sự kết hợp nhuần nhuyễn giữa nội dung lý tuyết và thực hành. Tại HIU sinh viên vận dụng các kiến thức được học qua các bản án cụ thể tại toà án, toạ đàm với các luật sự, thẩm phán. Các phiên toà giả định, tiết học phân vai thực hành, các cuộc thi pháp luật cấp khoa, cấp trường trường thường xuyên được tổ chức để giúp các bạn ôn tập kiến thức pháp luật đã học cũng như kỹ năng hành nghề luật thực tế cho sinh viên.', 23, 'assets/uploads/1717979996LUAT-KINH-TE.png', 7, 'Minh Anh', '2024-06-09'),
(14, 'HỌC TẬP THEO TẤM GƯƠNG ĐẠO ĐỨC HỒ CHÍ MINH', 'Giới thiệu cuốn sách đặc biệt sắp ra mắt bạn đọc LỜI DẠY CỦA BÁC HỒ VỀ VĂN HÓA VÀ THỂ THAO', 'Kỷ niệm 132 năm Ngày sinh Chủ tịch Hồ Chí Minh (19/5/1890 – 19/5/2022), thực hiện Kết luận số 01 – KL/TW ngày 18/5/2021 của Bộ Chính trị về tiếp tục thực hiện Chỉ thị số 05 – CT/TW “Về đẩy mạnh học tập và làm theo tư tưởng, đạo đức, phong cách Hồ Chí Minh”, đồng thời thiết thực chào mừng Hội nghị Văn hóa Thành phố Hồ Chí Minh lần thứ nhất (năm 2022), Sở Văn hóa và Thể thao Thành phố Hồ Chí Minh chỉ đạo Bảo tàng Hồ Chí Minh – Chi nhánh thành phố Hồ Chí Minh tổ chức biên soạn sách “Lời dạy của Bác Hồ về Văn hóa và Thể thao” dự kiến ra mắt bạn đọc đúng vào dịp sinh nhật lần thứ 132 năm của Chủ tịch Hồ Chí Minh. Với 79 lời dạy được chọn lọc trên cơ sở những lời kêu gọi, bài nói, bài viết của Bác, cùng với hơn 120 hình ảnh, tư liệu, bài viết, nội dung sách gồm 05 phần:\r\n\r\nPhần thứ nhất: Văn hóa\r\n\r\nPhần thứ hai: Văn học - Nghệ thuật\r\n\r\nPhần thứ ba: Di sản văn hóa\r\n\r\nPhần thứ tư: Thể dục - Thể thao\r\n\r\nPhần thứ năm: Đảng viên\r\n\r\nHy vọng rằng cuốn sách sẽ góp phần để mỗi cán bộ, đảng viên ngành Văn hóa, Thể thao nói chung, cán bộ, đảng viên ngành Văn hóa, Thể thao Thành phố Hồ Chí Minh nói riêng mãi khắc ghi những lời căn dặn giản dị, dễ hiểu tựa như những lời khuyên nhủ, những bài học hữu ích của Chủ tịch Hồ Chí Minh để có thể làm cho mình trở nên tốt hơn, tốt hơn với bản thân, với gia đình và xã hội, góp phần vào công cuộc xây dựng đất nước đàng hoàng hơn, to đẹp hơn như ước nguyện của Bác Hồ lúc sinh thời.', 10, 'assets/uploads/1717979347z5523571208142_eadd575c0c44667d50a394305fd1f985.jpg', 8, 'trung đức', '2024-06-07'),
(15, 'Lý giải nguyên nhân dịp Tết gia tăng trẻ bị chó, mèo cắn gây chấn thương', 'Kinhtedothi - Các dịp lễ, Tết, ngày nghỉ người dân đi lại nhiều,  buông lỏng là nguyên nhân làm gia tăng các trường hợp bị chó, mèo, vật nuôi cắn hoặc tấn công gây chấn thương.', 'Theo các chuyên gia y tế, nếu người dân bị súc vật tấn công không được dự phòng bằng tiêm huyết thanh kháng dại và vaccine phòng dại kịp thời, khả năng mắc bệnh dại rất lớn. Khi đó, tỷ lệ sống sót gần như không còn.  Nhiều trẻ bị vật nuôi cắn thương tâm trong dịp Tết  Trẻ em chiếm 90% trong các trường hợp bị súc vật tấn công. Hoàn cảnh bị tấn công chủ yếu xảy ra khi người dân đi chơi, thăm hỏi, chăm sóc vật nuôi trong dịp Tết.', 43, 'assets/uploads/1717980146ml.jpg', 9, 'trung đức', '2024-06-07'),
(16, 'Hà Nội FC thua đau Thanh Hoá, tụt xuống vị trí thứ 10 tại V-League 2023/2024', 'Kinhtedothi - Thủ môn Quan Văn Chuẩn khiến Hà Nội FC nhận thất bại 0-2 trước Thanh Hóa tại vòng 9 V-League 2023/2024.', 'Ở trận cầu tâm điểm của vòng 9 V-League 2023/2024, Hà Nội FC làm khách trên sân của Thanh Hoá. Theo lịch sử đối đầu, Hà Nội FC chưa thua Thanh Hoá trong vòng 5 năm kể lại đây, tính từ trận thua 1-4 năm 2019. Trong quãng thời gian đó, đội bóng Thủ đô giành 4 chiến thắng và 2 trận hoà. Ngày 09/6, 4 cặp đấu đã ra sân tranh tài. Trong đó, UBND Q.Gò Vấp thất bại 1-4 trước Phòng Cảnh sát giao thông (CATP); CATP.Thủ Đức dành chiến thắng tối thiểu 1-0 trước đội bóng đá Phường 5 (Gò Vấp); CAQ.Gò Vấp xuất sắc lội ngược dòng trước Ngân hàng Agribank Khu vực miền Nam với tỉ số 5-4.', 50, 'assets/uploads/1717979701th.jpg', 9, 'trung đức', '2024-06-07'),
(18, 'Bộ GDĐT chỉ đạo đổi mới phương pháp dạy học và kiểm tra, đánh giá môn Ngữ văn', 'Ngày 21/7, Bộ Giáo dục và Đào tạo (GDĐT) có Công văn số 3175/BGDĐT-GDTrH gửi các Sở GDĐT về việc hướng dẫn đổi mới phương pháp dạy học và kiểm tra, đánh giá môn Ngữ văn ở trường phổ thông.', 'Theo đó, thực hiện chỉ đạo của Bộ GDĐT, việc đổi mới phương pháp dạy học và kiếm tra, đánh giá môn Tiếng Việt cấp tiểu học và môn Ngữ văn câp trung học đã đạt được những kết quả nhất định. Để tiêp tục khăc phục tình trạng dạy học nặng về thuyết giảng, đọc chép và yêu cầu thuộc lòng theo văn mẫu, Bộ GDĐT yêu cầu các Sở GDĐT chỉ đạo các cơ sở giáo dục phổ thông, giáo dục thường xuyên thực hiện các nội dung về đổi mới phương pháp dạy học, kiểm tra và đánh giá môn Ngữ văn.\r\n\r\nĐổi mới dạy và học môn Ngữ văn\r\n\r\nBộ GDĐT yêu cầu các Sở GDĐT tăng cường hơn nữa việc phát huy tính tích cực, chủ động, sáng tạo của học sinh trong quá trình học tập môn Ngữ văn, dành nhiều thời gian cho các hoạt động thực hành, vận dụng, trình bày, thảo luận để rèn luyện kĩ năng đọc, viết, nói, nghe và cảm thụ thẩm mĩ theo yêu cầu, mức độ với từng lớp học, cấp học. Trong quá trình dạy học, giáo viên cần giao nhiệm vụ học tập rõ ràng, phù hợp với khả năng của học sinh, nêu cụ thể các yêu cầu về sản phẩm mà học sinh phải hoàn thành, chú trọng kiểm tra, đánh giá, hỗ trợ, động viên học sinh thực hiện nhiệm vụ học tập.\r\n\r\nSong song với đó, các Sở cần xây dựng kế hoạch bài dạy và tổ chức dạy học môn Ngữ văn theo hướng tăng cường rèn luyện cho học sinh phương pháp đọc, viết, nói và nghe. Hướng dẫn học sinh thực hành, trải nghiệm tiếp nhận và vận dụng kiến thức tiếng Việt, văn học thông qua các hoạt động học ở trong và ngoài lớp học.\r\n\r\nĐối với dạy đọc, xác định rõ mục đích giúp học sinh biết cách đọc và tự đọc hiểu được văn bản. Thông qua đó hình thành phẩm chất, nhân cách học sinh. Coi ngữ liệu là phương tiện và việc tìm hiểu ngữ liệu là cách thức để hình thành, phát triển năng lực đọc hiểu văn bản. Giáo viên có thể đưa ra những gợi ý, chỉ dẫn để giúp học sinh đọc nhưng không lấy việc phân tích, bình giảng của mình để áp đặt hay thay thế cho những suy nghĩ của học sinh. Tránh đọc chép và yêu câu học sinh ghi nhớ kiên thức một cách máy móc.', 15, 'assets/uploads/1717979470z5523571208142_eadd575c0c44667d50a394305fd1f985.jpg', 3, 'minh', '1232-12-12'),
(20, 'TUỔI TRẺ Y DƯỢC HƯỞNG ỨNG NGÀY CAO ĐIỂM UỐNG NƯỚC NHỚ NGUỒN, THAM GIA ĐẢM BẢO AN SINH XÃ HỘI.', 'Hưởng ứng đợt hoạt động kỷ niệm 75 năm Ngày Thương binh - Liệt sĩ  (27/7/1947 - 27/7/2022), đồng thời chào mừng Đại hội Đại biểu Đoàn TNCS Hồ Chí Minh Đại học Y Dược TP. Hồ Chí Minh lần thứ XX, nhiệm kỳ 2022 - 2024.', 'Hôm nay, ngày 26/7/2022, Đoàn Thanh niên - Hội Sinh viên Đại học Y Dược và Ban Chỉ huy chiến dịch Mùa hè xanh năm 2022 đã phối hợp tổ chức nhiều hoạt động thiết thực, ý nghĩa nhằm chăm lo cho các đối tượng chính sách trên địa bàn Quận 5 và Quận Bình Thạnh. Các hoạt động gồm có:\r\nTrao tặng 30 phần học bổng cho các trẻ em có hoàn cảnh khó khăn  trên địa bàn Quận Bình Thạnh, Quận 5. Mỗi phần trị giá 2,5 triệu đồng.\r\nTrao tặng 20 phần quà cho các gia đình chính sách, gia đình Thương bình, Liệt sĩ trên địa bàn Quận 5.\r\nNấu và trao tặng 200 suất cháo cho các đối tượng khó khăn, người lao động.\r\nTrao tặng 14 tủ thuốc y tế cho Đoàn Thanh niên các Phường trên địa bàn Quận 5. Vào chiều ngày 26/7/2022, Đoàn - Hội Sinh viên Trường do đồng chí Trương Văn Đạt - Bí thư Đoàn trường dẫn đầu đã đến thăm hỏi, tặng quà cho 03 gia đình thương binh, cựu chiến binh tại Phường 14, Quận 5. Trong không khí ấm cúng, thân tình, các câu chuyện về một thời chiến đấu gian lao, hào hùng đã được các ông kể lại. Các ông cũng không quên dặn dò các cháu sinh viên phải luôn cố gắng học thật giỏi để sau này chăm sóc sức khỏe cho mọi người để người dân có được cuộc sống hòa bình, hạnh phúc.', 35, 'assets/uploads/1717979321z5523571324485_42950b0a769bbb2a8cbff90cb787e2bc.jpg', 2, 'trung đức', '2024-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ho_ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kich_hoat` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `vai_tro` tinyint(1) NOT NULL DEFAULT '0',
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `ho_ten`, `kich_hoat`, `image`, `email`, `vai_tro`, `user_name`) VALUES
(1, '123', 'hoanganh1', 1, 'dseULSi.jpg', 'anh12@gmail.com', 1, 'anhhm'),
(7, '123123', '123', 1, '', 'anhhmph46019@fpt.edu.vn', 0, 'Hoàng'),
(11, 'a', 'tesst', 1, '', '123123@gmail.com', 1, '123123'),
(12, 'Ánh', '123', 1, '', 'anhhmph46019@fpt.edu.vn', 0, 'Hoàng'),
(13, '123123', '123', 1, 'ca1.jpg', 'anhhmph46019@fpt.edu.vn', 1, 'hoang'),
(14, '123123', '123', 1, '156952.jpg', 'a@gmail.com', 0, 'anhhm'),
(15, '123123', 'a', 1, NULL, 'as@gmail.com', 0, 'hoanganh'),
(20, '123', '123', 1, '', '123123@gmail.com', 0, '123123'),
(23, '$2y$10$0PTwRcNhyZhlGsRADPxZ1uGrlxJZhNirFJzTmLlViBZW9hXZitbWy', '123', 1, 'assets/uploads/17177123995reflection_wallpaper_by_puscifer91-d89vfdc.jpg', '12312@gmail.com', 1, 'Hoàn'),
(24, '$2y$10$K/KSYfuqlpH6BTCf5qqvkuvL.6DzmPBWlwGH/xfNZTknkbiqtuFfS', 'Hoàng Văn Hùng', 0, 'assets/uploads/1717930792Snaptik.app_736016840037667969811.jpg', 'hunghvph46092@fpt.edu.vn', 1, 'HoangHung'),
(25, '$2y$10$LaBDOOGuA7/0zA897cUwpuiK8a33BHQpDdlm4oUNPteJfd5z6WaHC', 'Hùng', 0, 'assets/uploads/1717930886Snaptik.app_73601684003766796988.jpg', 'hungdz8975@gmail.com', 0, 'HoangHung04'),
(26, '$2y$10$yQzNtjb26SSGhgfOmLHW6u9f9xvJN5hvAMzjmAFUb.Wp6VaFn032W', 'Hoàng Văn Hùng', 1, '0', 'admin@gmail.com', 1, 'Admin'),
(27, '$2y$10$EImECVvycIjQ5ldxDWZmoOF587tk9beugtnTkKu9YKVHYLfR12oTK', 'Hoàng Văn Hùng', 1, '0', 'client@gmail.com', 0, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_posts_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
