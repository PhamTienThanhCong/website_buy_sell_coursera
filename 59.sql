-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 13, 2022 lúc 01:59 PM
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
(3, 4, 'Khóa học MYSQL từ cơ bản đến nâng cao', 'Đi song song với ngôn ngữ lập trình PHP là hệ quản trị CSDL MySQL, đây là một cặp đôi thường được dùng để xây dựng các ứng dụng website. MySQL có nhiệm vụ lưu trữ dữ liệu và PHP có nhiệm vụ lập trình phía Server, tiếp nhận và xử lý yêu cầu của người dùng, sau đó lấy dữ liệu tương ứng và trả kết quả về cho client.\r\n\r\nĐể học MySQL thì bạn sẽ phải có một chút kiến thức về phân tích hệ thống, phân tích CSDL. Nghĩa là từ các yêu cầu của người dùng sẽ phân tích thiết kế một mô hình dữ liệu để lưu trữ các yêu cầu đó. Ví dụ khi bạn làm một website bán hàng thì bạn phải phân tích những đối tượng cần được lưu trữ, sau đó thiết kế thành các table và các mối quan hệ giữa các table đó.\r\n\r\nVà trong chuyên mục này mình sẽ giới thiệu một số chuyên đề như học MySQL căn bản, cách sử dụng View, trigger, procedure trong MySQL để từ đó các bạn có thể vận dụng trong project của các bạn. Điểm quan trọng nhất trong quá trình học MySQL là bạn phải siêng năng, chịu khó làm theo các ví dụ, tự nghĩ ra các câu truy vấn đề thực hành hoặc tìm những bài tập tương tự để thực hành. Quan trọng hơn nữa là bạn phải đặt câu hỏi nếu gặp khó khăn trong quá trình học MySQL.\r\n\r\nHiện nay mình chưa quay được nhiều video về MySQL nhưng trong tương lai mình sẽ cố gắng hoàn thành các video để các bạn dễ theo dõi hơn. Vì blog mới thành lập và tác giả viết bài còn hạn chế nên đành phải lấy thời gian để hứa với các bạn vậy. Cuối cùng chúc các bạn học MySQL tốt và hy vọng đây sẽ là nơi học lý tưởng cho các bạn.', 'Khóa học MYSQL từ cơ bản đến nâng cao1642078344.jpg', 1, 1200000, '2022-01-11 09:01:54'),
(14, 4, 'Khóa học html-css-javascript-php ', 'Khóa học cung cấp các kiến thức căn bản để học viên có thể đi làm được ở vị trí fullstack web developer. Học viên học được cách làm việc nhóm, giải quyết vấn đề, hiểu được quy trình, công cụ làm việc như trong thực tế.\r\n\r\nLưu ý: Hiện nay có một số kẻ xấu đang bán khóa học này dưới dạng video, đó là hành vi ăn cắp, mình đã làm việc với bên công an để có biện pháp xử lý. Các video họ bán đã quá cũ, không cập nhật các kiến thức mới như khóa học này. Một số trường hợp bị lừa đảo, gửi file không mở được. Không được cấp tài khoản và API để thực hành.\r\n\r\nĐể đăng ký khóa học hoặc bạn cần tư vấn, vui lòng kéo xuống dưới cùng.\r\n\r\nNếu học viên đã học sơ qua về lập trình web, khóa học này là cơ hội để hệ thống hóa kiến thức, học lại một cách bài bản, bù các kiến thức bị thiếu. Bởi vì chỉ cần “một cuốn sách, một người thầy” là đủ.\r\n\r\nKhóa học dành cho các học viên có kiến thức lập trình căn bản, có thời gian, sẵn sàng đeo bám khóa học đến cùng :) Học cho đến lúc nào đi làm được thì thôi.\r\n\r\nHọc viên có một người mentor bên cạnh, như một người bạn, sẵn sàng chia sẻ định hướng để phát triển bản thân trong ngành lập trình.\r\n\r\n', 'Khóa học html-css-javascript-php 1642081103.png', 1, 950000, '2022-01-13 13:38:23');

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
(18, 3, 'SQL chuyên sâu - Buổi cuối - Thi vấn đáp', 'E6lizfokiWA', 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql'),
(19, 14, 'Lập trình Web cơ bản - Buổi 1 - HTML', 'wiYWbm3r48A', ''),
(20, 14, 'Lập trình Web cơ bản - Buổi 2 - HTML - Bảng', 'Y0mgyEp8kFI', ''),
(21, 14, 'Lập trình Web cơ bản - Buổi 3 - HTML - Những thẻ thường gặp', 'cSgY3RWqqNc', ''),
(22, 14, 'Lập trình Web cơ bản - Buổi 4 - HTML - Form', '8t9qLdrlAvA', ''),
(23, 14, 'Lập trình Web cơ bản - Buổi 5 - CSS - Làm quen', 'iSdXPJg6G9k', ''),
(24, 14, 'Lập trình Web cơ bản - Buổi 6 - CSS - Layout', 'dJ2K_5VaUgc', ''),
(25, 14, 'Lập trình Web cơ bản - Buổi 7 - CSS - Pseudo & Selector', 'qJusq22MRvA', ''),
(26, 14, 'Lập trình Web cơ bản - Buổi 8 - JavaScript - Làm quen', 'h4wTJgQxnJg', ''),
(27, 14, 'Lập trình Web cơ bản - Buổi 9 - JavaScript - Loop & Input', '9HG9MmtpE7Y', ''),
(28, 14, 'Lập trình Web cơ bản - Buổi 10 - JavaScript - Array', 'KjHtFIR79XI', ''),
(29, 14, 'Lập trình Web cơ bản - Buổi 11 - JavaScript - Regex', 'nQcEK4HLoQs', ''),
(30, 14, 'Lập trình Web cơ bản - Buổi 12 - JavaScript - Validate Form', 'uBanTLR3YeE', ''),
(31, 14, 'Lập trình Web cơ bản - Buổi 14 - PHP - Giới thiệu', 'uEUa4qB97Kk', ''),
(32, 14, 'Lập trình Web cơ bản - Buổi 15 - PHP - Làm việc với Form', 'AH9STS4sJSo', ''),
(33, 14, 'Lập trình Web cơ bản - Buổi 16 - PHP - CRUD', '63H58_jGDco', ''),
(34, 14, 'Lập trình Web cơ bản - Buổi 17 - PHP - CRUD & Pagination & Searching & Hacking', 'xXmCzhU0BNY', ''),
(35, 14, ' Lập trình Web cơ bản - Buổi 18 - PHP - Ôn tập & layout', 'Wlo5aQw2UeI', ''),
(36, 14, 'Đồ án Web cơ bản - Phân nhóm & định hướng', 'pOzcjuEaXVI', ''),
(37, 14, 'Lập trình Web cơ bản - Buổi 19 - PHP - CRUD 2 bảng liên kết', 'MemEhFGO2X0', ''),
(38, 14, 'Lập trình Web cơ bản - Buổi 20 - PHP - Giao diện khách hàng', 'cEwux79AiKw', ''),
(39, 14, 'Đồ án Web cơ bản - Phân tích và thiết kế', '5o3BugEmhLk', ''),
(40, 14, 'Lập trình Web cơ bản - Buổi 21 - PHP - Signing & Hacking', '7pWAqw9XjVM', ''),
(41, 14, ' Lập trình Web cơ bản - Buổi 22 - PHP - Cookies', '27UPwj789E4', ''),
(42, 14, 'Lập trình Web cơ bản - Buổi 23 - PHP - Giỏ hàng', '1t9Hzq9_Rck', ''),
(43, 14, 'Lập trình Web cơ bản - Buổi 24 - PHP - Đặt hàng', 'yndPkfUMozI', ''),
(44, 14, 'Lập trình Web cơ bản - Buổi 25 - PHP - Admin', 'TdEOdeIOVEQ', ''),
(45, 14, 'Giao lưu và chia sẻ về Đồ án', '84JkzsD4-Sc', ''),
(46, 14, 'Lập trình web cơ bản - buổi 26 - PHP - Gửi email & Tâm sự cuối năm', 'fH9BVGeomMI', ''),
(47, 14, 'Đồ án Web cơ bản - Kiểm tra và đánh giá (L1)', 'YGc7zc0ZXvM', ''),
(48, 14, 'Lập trình web cơ bản - buổi 27 - PHP - Cấu hình CSDL và Quên mật khẩu', 'QG8Ai3oR8G4', ''),
(49, 14, 'Lập trình web cơ bản - buổi 28 - PHP - Thống kê', 'T1RCc4zALNc', ''),
(50, 14, 'Lập trình web cơ bản - buổi 29 - PHP & jQuery - Làm quen & Ajax', 'HszrnYMdfAU', ''),
(51, 14, 'VM834:12 Lập trình web cơ bản - buổi 30 - PHP & jQuery - Modal & Signin + Signup & Validate', 'x_XNnYk1aiw', '');

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
  ADD KEY `id_admin` (`id_admin`);

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
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
