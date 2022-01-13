-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 13, 2022 lúc 09:05 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `59`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` char(35) NOT NULL,
  `email_admin` varchar(150) NOT NULL,
  `phone_number_admin` varchar(15) NOT NULL,
  `address_admin` varchar(200) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `cash_admin` int(11) NOT NULL DEFAULT '1000',
  `lever` int(11) NOT NULL,
  `status_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `email_admin`, `phone_number_admin`, `address_admin`, `image`, `password`, `cash_admin`, `lever`, `status_admin`) VALUES
(4, 'Công phạm', 'congphamtienthanh@gmail.com', '0392524411', '30/4 hạ long, Quảng Ninh', 'Công phạm1641833277.jpg', 'cong', 1000, 1, 1),
(5, 'Mình là Công', 'congj2school@gmail.com', '396369332', 'Yên Nghĩa, Hà Đông, Hà Nội', 'Mình là Công1641832496.jpg', 'cong', 1000, 2, 1),
(8, 'cong j2sholl', 'cong.pttc@gmail.com', '936445789', '30/4 hạ long móng cái', 'none', 'cong', 1000, 1, 1),
(9, 'sinh vien pnk', '20010886@st.phenikaa-uni.edu.vn', '0396333541', 'yên nghĩa, hà đong', 'sinh vien pnk1641892120.png', 'cong', 1000, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `name_course` varchar(100) NOT NULL,
  `description_course` text NOT NULL,
  `image_course` varchar(150) NOT NULL,
  `status_course` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id_course`, `id_admin`, `name_course`, `description_course`, `image_course`, `status_course`, `price`, `created_at`) VALUES
(3, 4, 'Khóa học làm giàu', 'Được biết, gia đình anh Cường chị Hòa là hộ nghèo, có hoàn cảnh khó khăn của xã. Anh vốn ở nhà đi chạy máy cày thuê, còn chị đi làm công nhân cho công ty giày da Annora Việt Nam. Hôm xảy ra sự việc là ngày chị làm ca 1. Buổi chiều hôm đó, chị tranh thủ ra đồng làm ruộng, chồng ở nhà sửa máy cày. Lúc này máy hết dầu, chị đi hỏi vay 2 triệu đồng mua dầu cho chồng sửa máy để kịp làm đất. Vừa về tới cổng, chị đã thấy mọi người gọi vào nhanh đưa con đi cấp cứu.\r\nAnh L.T.Đ (anh trai của anh Cường), nhà ở gần đó cho biết, trước khi xảy ra sự việc, hai chị em An và N. vừa từ nhà anh trở về. Cháu T. (con trai lớn anh Cường) đang nấu ăn ở nhà bếp bên ngoài thì phát hiện có khói bốc ra từ trong nhà. Cháu vội đi múc nước tìm cách dập lửa. Khi người dân phát hiện sự việc, chạy tới ứng cứu thì đã thấy An, N. đang nằm ở ngoài hè, anh Cường thì đã nằm bất động trong đám cháy.\r\n“Khi tôi chạy đến thì đã thấy 2 cháu nằm ngoài hè. Khi xảy ra cháy, cháu N. (1 tuổi) chạy vào với bố, thấy vậy cháu An vào kéo được em ra ngoài thì cả hai chị em đều đã b.ỏ.n.g nặng. Lúc này thằng anh đang múc từng chậu nước để dập lửa nên cũng bị b.ỏ.n.g ở hai bàn chân”, anh Đ. kể lại.', 'Khóa học làm giàu1641891714.png', 1, 1200000, '2022-01-11 09:01:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `id_lesson` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `name_lesson` varchar(150) NOT NULL,
  `link_ytb_lesson` char(20) NOT NULL,
  `description_lesson` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lesson`
--

INSERT INTO `lesson` (`id_lesson`, `id_course`, `name_lesson`, `link_ytb_lesson`, `description_lesson`) VALUES
(3, 3, 'SQL - Buổi 1 - Làm quen', '-OCOG15SD1w', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql'),
(4, 3, 'SQL - Buổi 2 - Những câu lệnh cơ bản', '8T0edb1AYUg', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa'),
(5, 3, 'SQL - Buổi 3 - Những ràng buộc', 'd8-KYLxMPpM', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n00:00 Tâm sự mỏng\r\n32:40 Bắt đầu buổi học'),
(6, 3, 'SQL - Buổi 4 - Những hàm cơ bản', 'A0qfh0mEoLE', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql'),
(7, 3, 'SQL - Buổi 5 - Những hàm nhóm và thống kê', '1koJCVv8Os4', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql'),
(8, 3, 'SQL - Buổi 6 - Những ràng buộc khoá', 'a0ezTyvEhY8', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n\r\n00:00 Tâm sự thầm kín\r\n45:40 Bắt đầu buổi học\r\n01:44:00 Tâm sự công khai'),
(9, 3, 'SQL - Buổi 7 - Nối bảng (P1)', '6OQhvSQ1ZEo', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n\r\n00:00 Tâm sự đầu buổi học \r\n28:01 Chữa bài và học bài mới \r\n01:22:30 Tâm sự chuyên mục ngoài lề'),
(10, 3, 'SQL - Buổi 7 - Nối bảng (P2)', 'rwMLTX7vKrE', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n\r\n00:00 Tâm sự tuổi hồng và một ít mẹo nhỏ cũng như định hướng tương lai\r\n33:15 Bắt đầu bữa học \"cuối cùng\"\r\n01:40:40 Tâm sự cùng phím tắt'),
(11, 3, 'SQL chuyên sâu - Buổi 1 - Index & View', 'uJn89Ua7D8M', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #index #view\r\n\r\n00:00 Mở đầu và giải câu nâng cao buổi trước\r\n15:55 Index & View\r\n01:07:37 Cách mã hoá mật khẩu để tránh rủi ro khi bị lộ DB'),
(12, 3, 'SQL chuyên sâu - Buổi 2 - Procedure', 'yCyHpZALCG0', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #procedure\r\n\r\n00:00 Trò chuyện đầu buổi học \r\n14:57  Có hay không một DB chuẩn? Ví dụ \r\n27:09  Procedure, Function\r\n01:17:53 Chia sẻ về nghệ thuật xử lý background job'),
(13, 3, 'SQL chuyên sâu - Buổi 3 - Function', 'AlOM-lbJ1t8', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #function'),
(14, 3, 'SQL chuyên sâu - Buổi 4 - Trigger (After)', 'Oc-IlA-1jxc', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #trigger'),
(15, 3, 'SQL chuyên sâu - Buổi 5 - Trigger (Instead of)', 'BRk36X7prK0', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #trigger\r\n\r\n00:00 Tâm sự và trả lời câu hỏi\r\n28:00 Cơ bản\r\n59:00 Nâng cao + fix bug'),
(16, 3, 'SQL chuyên sâu - Buổi 6 - Chữa bài tập & Transaction', 'xPllalzVL_4', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #transaction'),
(18, 3, 'SQL chuyên sâu - Buổi cuối - Thi vấn đáp', 'E6lizfokiWA', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(35) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `phone_number_user` varchar(15) NOT NULL,
  `image_user` varchar(150) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `token_user` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Chỉ mục cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id_lesson`),
  ADD KEY `id_course` (`id_course`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Các ràng buộc cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
