-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 05, 2022 lúc 01:58 PM
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
  `status_admin` int(11) NOT NULL,
  `lever` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `token_admin` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `email_admin`, `phone_number_admin`, `address_admin`, `image`, `status_admin`, `lever`, `password`) VALUES
(4, 'Công phạm', 'congphamtienthanh@gmail.com', '0392524411', '30/4 hạ long, Quảng Ninh', 'Công phạm1641833277.jpg', 1, 1, 'cong'),
(5, 'Admin pro vip', 'congj2school@gmail.com', '396369332', 'Yên Nghĩa, Hà Đông, Hà Nội', 'Mình là Công1641832496.jpg', 1, 2, 'cong'),
(8, 'cong j2sholl', 'cong.pttc@gmail.com', '936445789', '30/4 hạ long móng cái', 'none', 1, 1, 'cong'),
(9, 'sinh vien pnk', '20010886@st.phenikaa-uni.edu.vn', '0396333541', 'yên nghĩa, hà đong', 'sinh vien pnk1641892120.png', -1, 1, 'cong'),
(10, 'Cong Pham nhé', 'cong1234@gmail.com', '01354248302', 'yên nghĩa, hà đong', 'none', 0, 1, 'cong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `name_course` varchar(100) NOT NULL,
  `description_course` text NOT NULL,
  `author` varchar(30) DEFAULT NULL,
  `image_course` varchar(150) NOT NULL,
  `status_course` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id_course`, `id_admin`, `name_course`, `description_course`, `author`, `image_course`, `status_course`, `price`, `created_at`) VALUES
(3, 4, 'Khóa học MYSQL từ cơ bản đến nâng cao', 'Đi song song với ngôn ngữ lập trình PHP là hệ quản trị CSDL MySQL, đây là một cặp đôi thường được dùng để xây dựng các ứng dụng website. MySQL có nhiệm vụ lưu trữ dữ liệu và PHP có nhiệm vụ lập trình phía Server, tiếp nhận và xử lý yêu cầu của người dùng, sau đó lấy dữ liệu tương ứng và trả kết quả về cho client.\r\n\r\nĐể học MySQL thì bạn sẽ phải có một chút kiến thức về phân tích hệ thống, phân tích CSDL. Nghĩa là từ các yêu cầu của người dùng sẽ phân tích thiết kế một mô hình dữ liệu để lưu trữ các yêu cầu đó. Ví dụ khi bạn làm một website bán hàng thì bạn phải phân tích những đối tượng cần được lưu trữ, sau đó thiết kế thành các table và các mối quan hệ giữa các table đó.\r\n\r\nVà trong chuyên mục này mình sẽ giới thiệu một số chuyên đề như học MySQL căn bản, cách sử dụng View, trigger, procedure trong MySQL để từ đó các bạn có thể vận dụng trong project của các bạn. Điểm quan trọng nhất trong quá trình học MySQL là bạn phải siêng năng, chịu khó làm theo các ví dụ, tự nghĩ ra các câu truy vấn đề thực hành hoặc tìm những bài tập tương tự để thực hành. Quan trọng hơn nữa là bạn phải đặt câu hỏi nếu gặp khó khăn trong quá trình học MySQL.\r\n\r\nHiện nay mình chưa quay được nhiều video về MySQL nhưng trong tương lai mình sẽ cố gắng hoàn thành các video để các bạn dễ theo dõi hơn. Vì blog mới thành lập và tác giả viết bài còn hạn chế nên đành phải lấy thời gian để hứa với các bạn vậy. Cuối cùng chúc các bạn học MySQL tốt và hy vọng đây sẽ là nơi học lý tưởng cho các bạn.', 'Nguyễn Nam Long', 'Khóa học MYSQL từ cơ bản đến nâng cao1642078344.jpg', 1, 1200000, '2022-01-11 02:01:54'),
(14, 4, 'Khóa học html-css-javascript-php ', 'Khóa học cung cấp các kiến thức căn bản để học viên có thể đi làm được ở vị trí fullstack web developer. Học viên học được cách làm việc nhóm, giải quyết vấn đề, hiểu được quy trình, công cụ làm việc như trong thực tế.\r\n\r\nLưu ý: Hiện nay có một số kẻ xấu đang bán khóa học này dưới dạng video, đó là hành vi ăn cắp, mình đã làm việc với bên công an để có biện pháp xử lý. Các video họ bán đã quá cũ, không cập nhật các kiến thức mới như khóa học này. Một số trường hợp bị lừa đảo, gửi file không mở được. Không được cấp tài khoản và API để thực hành.\r\n\r\nĐể đăng ký khóa học hoặc bạn cần tư vấn, vui lòng kéo xuống dưới cùng.\r\n\r\nNếu học viên đã học sơ qua về lập trình web, khóa học này là cơ hội để hệ thống hóa kiến thức, học lại một cách bài bản, bù các kiến thức bị thiếu. Bởi vì chỉ cần “một cuốn sách, một người thầy” là đủ.\r\n\r\nKhóa học dành cho các học viên có kiến thức lập trình căn bản, có thời gian, sẵn sàng đeo bám khóa học đến cùng :) Học cho đến lúc nào đi làm được thì thôi.\r\n\r\nHọc viên có một người mentor bên cạnh, như một người bạn, sẵn sàng chia sẻ định hướng để phát triển bản thân trong ngành lập trình.\r\n\r\n', 'Nguyễn Nam Long', 'Khóa học html-css-javascript-php 1642081103.png', 1, 950000, '2022-01-13 06:38:23'),
(15, 5, 'Khóa học lập trình Java đến OOP', 'Java là một trong các ngôn ngữ lập trình phổ biến, được ra đời vào năm 1995. Hiện nay, ông chủ của nó là Oracle. Và con số hơn 3 tỉ thiết bị trên toàn cầu sử dụng Java là một minh chứng rõ nhất cho sự phổ biến của ngôn ngữ này.\r\n\r\nJava có thể làm gì?\r\nỞ đây, tôi sẽ tóm tắt các ứng dụng của ngôn ngữ lập trình Java một cách ngắn gọn nhất. Nếu bạn muốn tự mình xây dựng một sản phẩm tương tự như vậy thì Java là lựa chọn tốt dành cho bạn. Dưới đây là các ứng dụng của Java trong thực tế:\r\n\r\nPhát triển ứng dụng mobile (điển hình là ứng dụng Android, cái này Việt Nam mình tuyển nhiều nè)\r\nXây dựng các ứng dụng trên máy tính (Windows, Ubuntu,…)\r\nViết website (JSP, Spring, … Cái này các công ty lớn ở Việt Nam cũng tuyển nhiều nè)\r\nViết web server/ ứng dụng server (Cái này cũng tuyển nhưng không nhiều bằng)\r\nViết trò chơi (game đó)\r\nCòn nhiều nữa nha…\r\nLý do nên học lập trình Java\r\n1. Java rất dễ học\r\n\r\nNhiều người sẽ ngạc nhiên khi thấy đây là một trong những lý do hàng đầu để học Java hoặc coi nó là ngôn ngữ lập trình tốt nhất, nhưng sự thật là vậy. Java là một ngôn ngữ lập trình bậc cao, các từ khóa là các từ tiếng anh (gần với ngôn ngữ tự nhiên) và theo nó là các quy tắc chặt chẽ.\r\n\r\n2. Java là ngôn ngữ hướng đối tượng (OOP)\r\n\r\nMột lý do khác, khiến Java trở nên phổ biến vì nó là ngôn ngữ lập trình hướng đối tượng. Điều này giúp phát triển các ứng dụng OOP dễ dàng hơn nhiều và nó cũng giúp giữ cho hệ thống được mô đun hóa, linh hoạt và có thể mở rộng.\r\n\r\n3. Java là một nền tảng độc lập\r\n\r\nĐây là lý do chính cho sự phổ biến của Java. Bạn chỉ cần viết code Java một lần duy nhất và có thể đem nó chạy bất cứ đâu (bao gồm Windows, Linux, MacOS,…). Điều này không có ở một số ngôn ngữ khác\r\n\r\n4. Java có ở mọi nơi\r\n\r\nỨng dụng Desktop: Java Swing, JavaFX\r\nMobile: J2ME hay một nền tảng phổ biến viết code cho Android hiện nay là Android Software Development Kit (SDK)\r\nLập trình Nhúng: Một số thiết bị, chẳng hạn như thẻ SIM, đầu đĩa, đồng hồ và TV, sử dụng các công nghệ Java nhúng\r\nLập trình Web: Hiện đang có nhu cầu tuyển dụng lớn tại Việt Nam. Một số framework phổ biến như Struts, Spring, Servlets,…\r\nỨng dụng doanh nghiệp: Java Enterprise Edition (Java EE) là một nền tảng phổ biến cung cấp API và môi trường thời gian chạy để viết kịch bản và chạy phần mềm doanh nghiệp, bao gồm các ứng dụng mạng và dịch vụ web\r\n4. Nhu cầu tuyển dụng lớn\r\n\r\nCác bạn hoàn toàn có thể kiểm chứng thông tin này bằng cách thử tìm kiếm công việc lập trình Java trên Google hoặc các trang tìm việc IT.\r\n\r\nVới mục đích giới thiệu đến mọi người về Ngôn ngữ Java - một ngôn ngữ lập trình khá mới mẻ so với C, C++, Java, PHP ở Việt Nam. Thông qua khóa học LẬP TRÌNH JAVA CƠ BẢN ĐẾN HƯỚNG ĐỐI TƯỢNG, Kteam sẽ hướng dẫn các bạn kiến thức cơ bản của Java. Để từ đó, có được nền tảng cho phép bạn tiếp tục tìm hiểu những kiến thức tuyệt vời khác của Java hoặc là một ngôn ngữ khác. Cụ thể trong khóa học này, Kteam sẽ giới thiệu với các bạn Java ở phiên bản Java 8 Đối tượng tham gia: Serial này dành cho các bạn muốn học, tìm hiểu về lập trình và xác định theo con đường lập trình viên lâu dài. Khóa học không khuyến khích những bạn tay ngang vào học lập trình vì bản chất Java là ngôn ngữ khó học và cần đi theo con đường học tập chuyên sâu. Khóa học này yêu cầu sinh viên phải có kiến thức vững chắc về lập trình cơ bản thường được học ở trường như nhập môn, kĩ thuật lập trình, cấu trúc dữ liệu,.. Thời lượng mỗi video từ 3 – 30 phút nhằm chia nhỏ quá trình thực hiện, giúp bạn dễ tiếp thu và ứng dụng source code hỗ trợ từ thư viện Howkteam.com Khoá học sẽ mang đến bạn kiến thức về: Cài đặt & sử dụng môi trường Java. Làm quen & hiểu cách sử dụng các khái niệm nền tảng trong Java. Kiến thức cơ bản như: ép kiểu, vòng lặp, mảng, …. Và tìm hiểu về Java Hướng Đối Tượng.\"\"\"', 'HowKteam', 'Khóa học lập trình Java đến OOP1642512072.jpg', 1, 499000, '2022-01-18 06:21:12'),
(16, 8, 'Khóa học làm giàu', 'FT 88 nhà cái uy tín chất lượng hàng đầu Việt Nam', 'Khá Bảnh', 'Khóa học làm giàu1642515381.jpg', 0, 99999999, '2022-01-18 07:16:21'),
(17, 5, 'Luyện code html-css-javaScript 30 ngày', 'Sử dụng hashtag: #30dayschallengecode\r\nLink dự án: https://www.nodemy.vn/projects-html-c...\r\n• Luyện tập 30 Projects thực chiến: https://www.youtube.com/watch?v=3odtU...\r\n', 'Nodemy', 'Luyện code html-css-javaScript 30 ngày1642650724.png', 1, 350000, '2022-01-19 20:52:04'),
(18, 5, 'Khóa học tiếng anh', 'Tự học tiếng Anh online như thế nào?\r\n​Bước 1: Xác định trình độ hiện tại của bạn.\r\nTrước khi bắt đầu học tiếng Anh, đặc biệt là học bằng hình thức online, bạn cần biết rõ khả năng của bản thân ở mức nào. Việc này giúp xác định cơ sở để từ đó bạn có thể lựa chọn bài học tiếng anh phù hợp. Tránh các trường hợp bài học tiếng anh quá dễ khiến bạn cảm thấy nhàm hay quá khó dẫn đến chán nản.\r\n\r\nBước 2: Biết được đâu là cách học phù hợp nhất với bạn.\r\nĐể biết được đâu là cách học tiếng anh tốt nhất đối với bản thân, bạn cần tìm kiếm một trang web hay khóa học dạy học tiếng anh theo cách khiến bạn hứng thú. Chỉ có như vậy, bạn mới có thể truy cập vào trang web mỗi ngày để học tiếng Anh thường xuyên được.\r\n\r\nBước 3: Lên lịch học cố định mỗi ngày\r\nMuốn sử dụng tiếng Anh thành thạo để đi du học, xin việc,… thì bạn cũng phải sử dụng nó liên tục như thói quen hằng ngày vậy. Do đó, việc lên lịch học cố định tiếng Anh mỗi ngày là rất cần thiết. Hãy chọn cho mình một khoảng thời gian học tập thích hợp và thực hiện đều đặn theo lịch trình đó.\r\nNếu bạn thấy nhàm chán, hãy chọn các chủ đề mà mình quan tâm. Từ đó, việc học tiếng Anh sẽ trở nên thú vị hơn\r\n\r\nBước 4: Vận dụng những gì học được vào thực tế\r\nCách học hiệu quả nhất chính là thực hành. Đừng quên các hoạt động thực tế khi học tiếng Anh nhé. Vì dù bạn có học nhiều đến mức nào đi chăng nữa nhưng lại không giao tiếp, đọc hay viết tiếng Anh trong cuộc sống thường ngày thì rất khó để sử dụng tiếng Anh thành thạo được.\r\nMột phương pháp vận dụng thường thấy là nói chuyện với người Anh, khách du lịch. Đây sẽ là cách giúp bạn tiếp thu vô cùng nhanh chóng và hiệu quả.\r\nBí quyết du học Đức miễn phí\r\n\r\nTừ vựng được xem là cơ sở để giao tiếp tiếng Anh. Không những thế, chỉ khi nắm được vốn từ vựng nhất định, bạn mới có thể học tiếp các kỹ năng khác như nghe, nói, đọc, viết. Do đó, bên cạnh ngữ pháp thì từ vựng có vai trò vô cùng quan trọng.\r\nTuy nhiên, cách học từ vựng và ngữ pháp lại có sự khác biệt. Nếu như học ngữ pháp chỉ yêu cầu bạn nắm các cấu trúc, quy tắc theo mẫu sẵn có. Thì từ vựng lại có nhiều cách học sáng tạo và thú vị hơn nhiều. Một trong số đó là học từ vựng online qua các hệ thống, ứng dụng chuyên dùng.\r\nLà một trong những trang web học tiếng Anh trực tuyến được ưa thích nhất, Voca.vn của cộng đồng Anh ngữ English Me là trang web chuyên dành để học và luyện từ vựng.\r\nCác ưu điểm nổi bậc của website học từ vựng tiếng anh Voca.vn là:\r\n\r\nPhương pháp ghi nhớ từ vựng sinh động, thú vị và dễ nhớ.\r\nGiúp người học ôn tập từ vựng cũ thường xuyên với tính năng nhắc nhở.\r\nNgười học đánh giá sự tiến bộ của bản thân theo thời gian thông qua tính năng đo lường.\r\nGiao diện đẹp, thân thiện với người dùng và rất dễ sử dụng.\r\nThư viện từ vựng phong phú với nhiều chủ đề khác nhau.\r\nNgười học được trải nghiệm miễn phí một bộ từ vựng để hiểu cách học trước khi trả học phí chính thức để được học nhiều bộ từ vựng khác.\r\nHệ thống có thể sử dụng trên nhiều phương tiện khác nhau như máy tính bàn, laptop, smartphone.', 'Đặng Hồng Hạnh', 'Khóa học tiếng anh1644305833.jpg', 0, 99000, '2022-02-08 07:37:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `id_lesson` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `name_lesson` varchar(150) NOT NULL,
  `link` varchar(100) NOT NULL,
  `type_link` int(11) NOT NULL DEFAULT '1',
  `description_lesson` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lesson`
--

INSERT INTO `lesson` (`id_lesson`, `id_course`, `name_lesson`, `link`, `type_link`, `description_lesson`) VALUES
(3, 3, 'SQL - Buổi 1 - Làm quen', '-OCOG15SD1w', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql'),
(4, 3, 'SQL - Buổi 2 - Những câu lệnh cơ bản', '8T0edb1AYUg', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa'),
(5, 3, 'SQL - Buổi 3 - Những ràng buộc', 'd8-KYLxMPpM', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n00:00 Tâm sự mỏng\r\n32:40 Bắt đầu buổi học'),
(6, 3, 'SQL - Buổi 4 - Những hàm cơ bản', 'A0qfh0mEoLE', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql'),
(7, 3, 'SQL - Buổi 5 - Những hàm nhóm và thống kê', '1koJCVv8Os4', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql'),
(8, 3, 'SQL - Buổi 6 - Những ràng buộc khoá', 'a0ezTyvEhY8', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n\r\n00:00 Tâm sự thầm kín\r\n45:40 Bắt đầu buổi học\r\n01:44:00 Tâm sự công khai'),
(9, 3, 'SQL - Buổi 7 - Nối bảng (P1)', '6OQhvSQ1ZEo', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n\r\n00:00 Tâm sự đầu buổi học \r\n28:01 Chữa bài và học bài mới \r\n01:22:30 Tâm sự chuyên mục ngoài lề'),
(10, 3, 'SQL - Buổi 7 - Nối bảng (P2)', 'rwMLTX7vKrE', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql\r\n\r\n00:00 Tâm sự tuổi hồng và một ít mẹo nhỏ cũng như định hướng tương lai\r\n33:15 Bắt đầu bữa học \"cuối cùng\"\r\n01:40:40 Tâm sự cùng phím tắt'),
(11, 3, 'SQL chuyên sâu - Buổi 1 - Index & View', 'uJn89Ua7D8M', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #index #view\r\n\r\n00:00 Mở đầu và giải câu nâng cao buổi trước\r\n15:55 Index & View\r\n01:07:37 Cách mã hoá mật khẩu để tránh rủi ro khi bị lộ DB'),
(12, 3, 'SQL chuyên sâu - Buổi 2 - Procedure', 'yCyHpZALCG0', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #procedure\r\n\r\n00:00 Trò chuyện đầu buổi học \r\n14:57  Có hay không một DB chuẩn? Ví dụ \r\n27:09  Procedure, Function\r\n01:17:53 Chia sẻ về nghệ thuật xử lý background job'),
(13, 3, 'SQL chuyên sâu - Buổi 3 - Function', 'AlOM-lbJ1t8', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #function'),
(14, 3, 'SQL chuyên sâu - Buổi 4 - Trigger (After)', 'Oc-IlA-1jxc', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #trigger'),
(15, 3, 'SQL chuyên sâu - Buổi 5 - Trigger (Instead of)', 'BRk36X7prK0', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #trigger\r\n\r\n00:00 Tâm sự và trả lời câu hỏi\r\n28:00 Cơ bản\r\n59:00 Nâng cao + fix bug'),
(16, 3, 'SQL chuyên sâu - Buổi 6 - Chữa bài tập & Transaction', 'xPllalzVL_4', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #transaction'),
(18, 3, 'SQL chuyên sâu - Buổi cuối - Thi vấn đáp', 'E6lizfokiWA', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql'),
(19, 14, 'Lập trình Web cơ bản - Buổi 1 - HTML', 'wiYWbm3r48A', 1, ''),
(20, 14, 'Lập trình Web cơ bản - Buổi 2 - HTML - Bảng', 'Y0mgyEp8kFI', 1, ''),
(21, 14, 'Lập trình Web cơ bản - Buổi 3 - HTML - Những thẻ thường gặp', 'cSgY3RWqqNc', 1, ''),
(22, 14, 'Lập trình Web cơ bản - Buổi 4 - HTML - Form', '8t9qLdrlAvA', 1, ''),
(23, 14, 'Lập trình Web cơ bản - Buổi 5 - CSS - Làm quen', 'iSdXPJg6G9k', 1, ''),
(24, 14, 'Lập trình Web cơ bản - Buổi 6 - CSS - Layout', 'dJ2K_5VaUgc', 1, ''),
(25, 14, 'Lập trình Web cơ bản - Buổi 7 - CSS - Pseudo & Selector', 'qJusq22MRvA', 1, ''),
(26, 14, 'Lập trình Web cơ bản - Buổi 8 - JavaScript - Làm quen', 'h4wTJgQxnJg', 1, ''),
(27, 14, 'Lập trình Web cơ bản - Buổi 9 - JavaScript - Loop & Input', '9HG9MmtpE7Y', 1, ''),
(28, 14, 'Lập trình Web cơ bản - Buổi 10 - JavaScript - Array', 'KjHtFIR79XI', 1, ''),
(29, 14, 'Lập trình Web cơ bản - Buổi 11 - JavaScript - Regex', 'nQcEK4HLoQs', 1, ''),
(30, 14, 'Lập trình Web cơ bản - Buổi 12 - JavaScript - Validate Form', 'uBanTLR3YeE', 1, ''),
(31, 14, 'Lập trình Web cơ bản - Buổi 14 - PHP - Giới thiệu', 'uEUa4qB97Kk', 1, ''),
(32, 14, 'Lập trình Web cơ bản - Buổi 15 - PHP - Làm việc với Form', 'AH9STS4sJSo', 1, ''),
(33, 14, 'Lập trình Web cơ bản - Buổi 16 - PHP - CRUD', '63H58_jGDco', 1, ''),
(34, 14, 'Lập trình Web cơ bản - Buổi 17 - PHP - CRUD & Pagination & Searching & Hacking', 'xXmCzhU0BNY', 1, ''),
(35, 14, ' Lập trình Web cơ bản - Buổi 18 - PHP - Ôn tập & layout', 'Wlo5aQw2UeI', 1, ''),
(36, 14, 'Đồ án Web cơ bản - Phân nhóm & định hướng', 'pOzcjuEaXVI', 1, ''),
(37, 14, 'Lập trình Web cơ bản - Buổi 19 - PHP - CRUD 2 bảng liên kết', 'MemEhFGO2X0', 1, ''),
(38, 14, 'Lập trình Web cơ bản - Buổi 20 - PHP - Giao diện khách hàng', 'cEwux79AiKw', 1, ''),
(39, 14, 'Đồ án Web cơ bản - Phân tích và thiết kế', '5o3BugEmhLk', 1, ''),
(40, 14, 'Lập trình Web cơ bản - Buổi 21 - PHP - Signing & Hacking', '7pWAqw9XjVM', 1, ''),
(41, 14, ' Lập trình Web cơ bản - Buổi 22 - PHP - Cookies', '27UPwj789E4', 1, ''),
(42, 14, 'Lập trình Web cơ bản - Buổi 23 - PHP - Giỏ hàng', '1t9Hzq9_Rck', 1, ''),
(43, 14, 'Lập trình Web cơ bản - Buổi 24 - PHP - Đặt hàng', 'yndPkfUMozI', 1, ''),
(44, 14, 'Lập trình Web cơ bản - Buổi 25 - PHP - Admin', 'TdEOdeIOVEQ', 1, ''),
(45, 14, 'Giao lưu và chia sẻ về Đồ án', '84JkzsD4-Sc', 1, ''),
(46, 14, 'Lập trình web cơ bản - buổi 26 - PHP - Gửi email & Tâm sự cuối năm', 'fH9BVGeomMI', 1, ''),
(47, 14, 'Đồ án Web cơ bản - Kiểm tra và đánh giá (L1)', 'YGc7zc0ZXvM', 1, ''),
(48, 14, 'Lập trình web cơ bản - buổi 27 - PHP - Cấu hình CSDL và Quên mật khẩu', 'QG8Ai3oR8G4', 1, ''),
(49, 14, 'Lập trình web cơ bản - buổi 28 - PHP - Thống kê', 'T1RCc4zALNc', 1, ''),
(50, 14, 'Lập trình web cơ bản - buổi 29 - PHP & jQuery - Làm quen & Ajax', 'HszrnYMdfAU', 1, ''),
(51, 14, 'Lập trình web cơ bản - buổi 30 - PHP & jQuery - Modal & Signin + Signup & Validate', 'x_XNnYk1aiw', 1, ''),
(52, 15, 'Bài 1: Giới thiệu Java', '3gtOAlcovoQ', 1, 'Trong bài học này, chúng ta sẽ cùng tìm hiểu các vấn đề:\r\n\r\nSơ lược về ngôn ngữ Java\r\nNhững đặc trưng của ngôn ngữ Java'),
(53, 15, 'Bài 2: Cài đặt môi trường Java', 'KjMRn1YQcLc', 1, 'Bài này sẽ giới thiệu bao gồm các nội dung sau:\r\n\r\nGiải thích về JVM, JRE và JDK\r\nCài đặt môi trường Java\r\nCấu hình Java\r\nlink download jdk:\r\nhttps://www.oracle.com/java/technologies/downloads/'),
(54, 15, 'Bài 3: Chương trình Java đầu tiên', 'jIQmebw9VaA', 1, 'Để theo dõi bài này tốt nhất, bạn nên:\r\n\r\nCÀI ĐẶT MÔI TRƯỜNG JAVA\r\nBài này sẽ giới thiệu bao gồm các nội dung sau:\r\n\r\nGiải thích Compiler\r\nViết chương trình Java'),
(55, 15, 'Bài 4: Biến trong Java', 'G2mCSTtBojM', 1, 'Để theo dõi tốt bài này, bạn nên:\r\n\r\nCÀI ĐẶT MÔI TRƯỜNG JAVA\r\nXem qua bài VIẾT CHƯƠNG TRÌNH JAVA ĐẦU TIÊN.\r\nBài này chúng ta sẽ tìm hiểu những vấn đề sau:\r\n\r\nBiến là gì? Lý do sử dụng biến.\r\nCách khai báo và sử dụng biến.\r\nQuy tắc đặt tên biến'),
(56, 15, 'Bài 5: Kiểu dữ liệu trong Java', '4k_5vWY2wps', 1, 'Để đọc hiểu bài này, tốt nhất các bạn nên có kiến thức cơ bản về các phần sau:\r\n\r\nCÁC BIẾN TRONG JAVA\r\nBài này chúng ta sẽ tìm hiểu những vấn đề sau:\r\n\r\nKiểu dữ liệu là gì? Lý do phải có kiểu dữ liệu.\r\nPhân loại các kiểu dữ liệu.'),
(57, 15, 'Bài 6: Toán tử trong Java', 'H9FmP010A_Q', 1, 'Để đọc hiểu bài này, tốt nhất các bạn nên có kiến thức cơ bản về các phần sau:\r\n\r\nCÁC BIẾN TRONG JAVA\r\nCÁC KIỂU DỮ LIỆU TRONG JAVA\r\nBài này chúng ta sẽ tìm hiểu những vấn đề sau:\r\n\r\nDanh sách các toán tử, ý nghĩa.\r\nĐộ ưu tiên các toán tử'),
(58, 15, 'Bài 7: Hằng trong Java', 'dqybUkGCaVw', 1, 'Hằng là gì? Lý do sử dụng hằng\r\nHằng là một biến mà giá trị không đổi trong suốt chương trình, tất nhiên ta đã khởi tạo giá trị ngay từ đầu.\r\n\r\nLý do sử dụng hằng:\r\n\r\nTạo ra những giá trị vốn thực tế không cho thay đổi, làm chương trình an toàn hơn.\r\nGiúp người đọc biết ý nghĩa con số vô cảm trong khoa học như có thể áp dụng giá trị số PI, gia tốc trọng trường,...\r\nSẽ cảnh báo nếu người dùng cố tình thay đổi giá trị sau này. Đảm bảo tính toán vẹn của giá trị.'),
(59, 15, 'Bài 8: Ép kiểu trong Java', 'kOMiIKLCK34', 1, 'Ép kiểu là gì? Ý nghĩa\r\nÉp kiểu là cách chuyển biến thuộc kiểu dữ liệu này thành biến thuộc kiểu dữ liệu khác.\r\n\r\nÝ nghĩa:\r\n\r\nViệc chuyển kiểu dữ liệu sẽ đến lúc phải cần trong quá trình xử lý chương trình\r\nCó thể định dạng đúng kiểu dữ liệu mình mong muốn (Như cách hiển thị kiểu ngày tháng năm trên thế giới khác với Việt Nam nên ta sẽ chuyển kiểu ngày theo phong cách địa phương).'),
(60, 15, 'Bài 9: Cấu trúc rẽ nhánh trong Java', 'vradAZcby8I', 1, 'Trong lập trình, có những lúc ta cần phân chia các trường hợp và mỗi hoàn cảnh sẽ thực hiện những đoạn chương trình khác nhau. Như vậy dựa vào điều kiện ta sẽ rẽ nhánh cho chương trình chạy câu lệnh tương ứng.\r\n\r\nPhân loại: Có 2 loại cấu trúc rẽ nhánh là dạng thiếu và dạng đủ\r\n\r\nVí dụ:\r\n\r\nDạng thiếu: Nếu biến age trên 18 thì ta sẽ in ra ‘Bạn đã đủ tuổi để đăng kí’.\r\nDạng đủ: Nếu biến age trên 18 thì ta sẽ in ra ’Bạn đã đủ tuổi để đăng kí’, ngược lại thì in ra là ‘Bạn chưa đủ tuổi để đăng kí’ '),
(61, 15, 'Bài 10: Vòng lặp While trong Java', 'tDfQ33fmmvs', 1, 'Vòng lặp WHILE là gì? Tiến trình hoạt động như thế nào?\r\nBản chất của vòng lặp trong lập trình là ta muốn một vài dòng code được chạy đi chạy lại nhiều lần đến một điều kiện nào đó sẽ kết thúc.\r\n\r\nTrong vòng lặp WHILE, ta sẽ tạo một điều kiện cho vòng lặp, nếu điều kiện đúng thì khối lệnh lặp sẽ thực hiện cho đến khi điều kiện sai\r\n\r\nVí dụ: Ta tạo một biến chạy là index với lúc đầu giá trị bằng 0, ta sẽ in ra giá trị index rồi tăng nó lên một đơn vị cho đến khi index lớn 10.'),
(62, 15, 'Bài 11: Vòng lặp For trong Java', '1QVfZFOt7uI', 1, 'Vòng lặp For là gì?\r\nNhư bài trước Kteam có nói về VÒNG LẶP WHILE TRONG JAVA  thì phải cần một điều kiện để thực hiện hoặc kết thúc vòng lặp. Mà có khi ta chỉ muốn khối lệnh đó lặp n lần nhất định, thì việc đơn giản là tạo một cái biến đếm và thay đổi n lần.\r\n\r\nVì vậy, Vòng lặp For chính giúp chúng ta tạo những vòng lặp n lần nhất định bằng một biến chạy. Vòng lặp For có thể giúp ta giải phóng bộ nhớ biến chạy.'),
(63, 15, 'Bài 12: Mảng trong Java', '0LX_B3-0XuU', 1, 'Mảng là gì? Ưu nhược của mảng\r\nMảng là gì?\r\nMảng là tập hợp các đối tượng có cùng kiểu dữ liệu và được lưu trữ gần nhau trong bộ nhớ. Mỗi đối tượng hay được gọi là phần tử, các phần từ được phân biệt bằng vị trí (hay chỉ số phần tử), được bắt đầu từ vị trí 0.\r\nƯu nhược của mảng\r\nƯu điểm:\r\n\r\nTối ưu code: Gom các phần tử liên quan vào chung một với nhau giúp code gọn gàng hơn.\r\nCó thể truy cập ngấu nhiên: Do các vị trí ô lưu trữ liên tiếp ta có thể truy cập ngấu nhiên bằng chỉ số phần tử dễ dàng và nhanh chóng.\r\nDễ thao tác, quản lý và nâng cấp: Như muốn thay đổi các giá trị theo 1 quy luật thì ta sẽ tận dụng sử dụng những vòng lặp lập trình.\r\nNhược điểm:\r\n\r\nGiới hạn kích thước: Khi sử dụng mảng ta phải khai báo kích thước lưu trữ của mảng và không thể thay đổi kích thước trong lúc chạy.\r\nVùng lưu trữ phải liên tiếp: Đây cũng là vừa ưu vừa nhược điểm. Vì yêu cầu các ô nhớ liên tiếp nên phải tốn không gian bộ nhớ, hoặc đủ ô nhớ nhớ nhưng các ô nhớ không tiếp nên không thể khai báo được.'),
(64, 15, 'Bài 13:Foreach trong Java', 'SVnPYiHS68U', 1, 'FOR-EACH là gì?\r\nFOR-EACH là một kỹ thuật duyệt mảng khác như các vòng lặp trước. Nhưng thay vì khai báo hay khởi tạo biến lặp vị trí, chúng ta sẽ khai báo một biến chung kiểu dữ liệu của mảng, sử dụng biến đó duyệt các phần tử các mảng mà không cần lấy vị trí (index) của mỗi phần tử.\r\n\r\nNếu các bạn đã tìm hiểu cấu trúc dữ liệu và giải thuật ở trường, có những loại tập hợp đặc biệt mà không sắp xếp các phần tử bằng index như danh sách liên kết, map, vector,… Thì FOR-EACH sẽ giúp ta duyệt các phần tử các danh sách đó vì không cần vị trí (index) các phần tử đó.'),
(65, 15, 'Bài 14: Break và Continue trong Java', 'DrFwmhHqiA8', 1, 'Câu lệnh break\r\nÝ nghĩa:\r\n\r\nCâu lệnh break sẽ dừng vòng lặp chứa nó đang chạy. Thường hay sử dụng khi đạt được mục đích và không muốn tốn thời gian.\r\n\r\nCâu lệnh continue\r\nÝ nghĩa:\r\n\r\nCâu lệnh continue sẽ bỏ qua một vòng lặp và thực hiện vòng lặp tiếp theo. Continue thường được dùng trong trường hợp có những giá trị lặp ta muốn bỏ qua xử lý.\r\n\r\nVí dụ: Tính tổng các giá trị trong mảng. Nếu có phần tử bằng 13 thì bỏ qua'),
(66, 15, 'Bài 15:Switch trong Java', 'P90f0KWQtv0', 1, 'Switch là gì?\r\nSwitch thuộc dạng câu lệnh rẽ nhánh, switch sẽ kiểm tra so sánh biến với những giá trị khác nhau. Với mỗi trường hợp các giá trị, chúng ta sẽ viết những khối lệnh thực thi. Ngoài ra, có thể xử lý trường hợp không đúng với những giá trị mà ta đã liệt kê.'),
(67, 15, 'Bài 16: OOP trong Java', '8vOnoUZNtCA', 1, 'Những khái niệm cơ bản của lập trình hướng đối tượng\r\nĐối tượng (Object)\r\nĐối tượng ở đây ta thể hiểu như khái niệm bên ngoài: Con người, Xe máy, Nhà cửa…\r\n\r\nTrong một đối tượng sẽ bao gồm 2 thông tin: thuộc tính và phương thức.\r\n\r\nThuộc tính: là những thông tin của đối tượng. Ví dụ: con người có họ tên, chiều cao, độ tuổi,…\r\nPhương thức: là những thao tác, hành động mà đối tượng đó có thể thực hiện. Ví dụ: con người có những hành động ăn, ngủ, đi lại,…\r\nLớp (Class)\r\nLớp chính là định nghĩa của đối tượng, ta sẽ xây dựng lớp để tạo ra những đối tượng khác nhau. Ví dụ như: Bạn Nguyễn Văn A và Lê Văn B đều là con người, mà con người thì đều có tên, tuổi, chiều cao,.. tuy nhiên thông tin lại khác nhau như ngoài tên, bạn A 20 tuổi còn bạn B 22 tuổi. Như vậy con người chính là lớp, Nguyễn Văn A và Lê Văn B là đối tượng.\r\n\r\nHướng đối tượng trong Java\r\nBản chất Java là ngôn ngữ thuần hướng đối tượng, vì vậy đây là ngôn ngữ bậc cao nên việc học lập trình ngay từ đầu bạn sẽ thấy khó hiểu với những từ khóa class, new,... Đó là lý do Kteam không khuyến khích những bạn mới bắt đầu học lập trình lựa chọn Java.'),
(68, 15, 'Bài 17: Class trong Java', 'j_zeaTrH0cU', 1, 'Class là gì?\r\nClass (Lớp) là người dùng định nghĩa thiết kế cho hướng đối tượng. Nó đại diện cho những tập thuộc tính và phương thức chung cho tất cả các đối tượng của lớp này.\r\n\r\nNếu trong những ngôn ngữ thuần hướng đối tượng như Java, C#,.. thì Class chính là kiểu dữ liệu mà lập tình viên tự tạo ra.\r\n\r\nThuộc tính và phương thức trong hướng đối tượng\r\nThuộc tính\r\nThuộc tính là những thông tin riêng của mỗi đối tượng, ta có thể thấy nó như là những biến liên quan đến đối tượng đó.\r\n\r\nChúng ta cần phải thống nhất nhóm đối tượng cần có những thông tin cơ bản gì? Không thể có chuyện đối tượng bạn A có tên, tuổi, chiều cao; bạn B chỉ có tên, cân nặng, quê quán; Việc thông tin không thống nhất gây ra quản lý khó đảm bảo.\r\n\r\nĐó là lý do ta phải khai báo các thuộc tính trong lớp để các đối tượng của lớp đó bắt buộc phải có thông tin lưu trữ các thuộc tính trên.\r\n\r\nPhương thức\r\nĐây là kiến thức khá mới mẻ trong loạt bài viết này. Phương thức trong hướng đối tượng là cách xử lý hành vi của đối tượng. Bản chất, trong phương thức sẽ chứa loạt code, khi ta gọi phương thức của đối tượng, những dòng code trong phương thức đó sẽ thực hiện.\r\n\r\nNếu các bạn đã từng học các ngôn ngữ lập trình hướng thủ tục, thì phương thức nó khá giống hàm. Tuy nhiên, phương thức khác hàm là phương thức phải khai báo trong lớp, còn hàm thì khai báo độc lập.'),
(69, 15, 'Bài 18: Phạm vi truy cập trong Java', 's6-UDkzggDk', 1, 'Phạm vi truy cập là gì? Package là gì?\r\nPhạm vi truy cập (access modifiers) là xác định độ truy cập phạm vi vào dữ liệu của các thuộc tính, phương thức hoặc class.\r\n\r\nPackage (gói) là nhóm các class, interface hoặc các package con liên quan lại với nhau. Việc dùng package dùng để nhóm các class liên quan với nhau thành thư viện như thư viện swing, awt,…Ngoài ra, mục đích của package ngăn cản xung đột đặt tên, điều kiện truy cập, thuận tiện tìm kiếm và lưu trữ.\r\n\r\nCác loại phạm vi truy cập\r\nCó 4 loại phạm vi truy cập:\r\nPrivate\r\n(Default)\r\nProtected\r\nPublic\r\n\r\nPrivate\r\nPrivate chỉ cho phép truy cập nội bổ của một class.\r\n\r\nVí dụ: cho thuộc tính age của class Person ở dạng private, thì chỉ có thể truy cập age trong class Person.\r\n\r\n(Default)\r\nĐây là phạm vị mặc định, khi bạn không ghi gì hết thì nó để phạm vị truy cập dạng này: Ở mặc định, phạm vi truy cập chỉ nằm trong nội bộ package.\r\n\r\nVí dụ: ta xóa tất cả phạm vị truy cập ở class Person như sau\r\n\r\nProtected\r\nProtected là phạm vi truy cập có thể từ trong và ngoài package, nhưng phải thông qua tính kế thừa. Tính kế thừa sẽ được Kteam giải thích rõ hơn trong bài TÍNH KẾ THỪA TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG. Protected chỉ có thể áp dụng bên trong class như thuộc tính, phương thức hay lớp con. Không thể áp dụng cho lớp ngoài hay interface.\r\n\r\nPublic\r\nĐây phạm vi truy cập rộng, có thể truy cập bất cứ đâu trong project Java. Tất nhiên khi khác package để cần phải khai báo import để xác định ví trí của class như phần giải thích trên trên.'),
(70, 15, 'Bài 19: Static trong Java', 'I3tlj977x08', 1, 'Từ khóa static làm gì?\r\nKhi ta khai báo các thuộc tính, phương thức thì nó chỉ được sử dụng khi khởi tạo đối tượng, thông tin cũng thuộc đối tượng đó.\r\n\r\nCó những lúc, ta cần những thông tin chung cho tất cả các đối tượng. Có nghĩa những thông tin đó lưu ở một vùng nhớ duy nhất. Từ khóa static sử dụng để quản lý bộ nhớ, khi những thành viên bên trong một lớp có từ khóa static thì nó thuộc về lớp, không phải thuộc về riêng một đối tượng nào đó.\r\n\r\nCách sử dụng static\r\nTạo biến tĩnh\r\nKhi khai báo một biến tĩnh, biến đó có thể lưu thông tin chung cho tất cả các đối tượng.\r\n\r\nVí dụ: tạo một class Student của một trường ‘Kteam Education’, như vậy chỉ cần một bộ nhớ chung lưu thông tin tên trường, như vậy tiết kiệm bộ nhớ hơn. Ngoài ra, ta có thể tạo một biến đếm có bao nhiêu đối tượng Student đã được tạo ra:\r\n\r\nTạo phương thức tĩnh\r\nPhương thức tĩnh cũng giống như biến tĩnh, có thể gọi mà không cần khởi tạo đối tượng. Phương thức tĩnh rất thích hợp cho những class thư viện viết sẵn, không cần khởi tạo mà chỉ cần gọi ra để chạy chương trình.\r\n\r\nKhối static\r\nKhối static được sử dụng cho mục đích khởi tạo giá trị các biến static. Khối sẽ được thực hiện khi lớp chứa nó được load vào trong bộ nhớ.\r\nTrong một lớp có thể nhiều khối tùy ý. Các khối này sẽ chạy cùng nhau, và chạy trước cả chương trình main của lớp đó.'),
(71, 15, 'Bài 20: This trong Java', 'gIWwValOk0w', 1, 'Từ khóa this làm gì?\r\nTừ khóa this dùng để ánh xạ đối tượng hiện tại. Giống như trong lớp Student có rất nhiều đối tượng như bạn Châu, Long, Thanh,… thì khi xử lý các thuộc tính và phương thức ta sẽ dùng từ ‘bạn ấy’ để ám chỉ đối tượng hiện tại cần thực hiện.\r\n\r\n'),
(72, 15, 'Bài 21: Kế thừa trong Java', 'FscxYO3s6Go', 1, 'Khái niệm kế thừa\r\nKế thừa có nghĩa là thừa hưởng lại, ví dụ như tài sản của ba mẹ sẽ được giao lại cho con cái.\r\nKế thừa trong lập trình (Inheritance) có nghĩa là một lớp sẽ thừa hưởng lại những thuộc tính, phương thức từ lớp khác.\r\nViệc sử dụng kế thừa nhằm tái sử dụng code đã viết trước đó, thuận tiện trong việc bảo trì và nâng cấp chương trình.\r\n\r\n'),
(73, 15, 'Bài 22: Setter và Getter trong Java', 'POoxuSKIP4I', 1, 'Setter và Getter là gì? Lý do sử dụng\r\nSetter và Getter là 2 phương thức sử dụng để cập nhật hoặc lấy ra giá trị thuộc tính, đặc biệt dành cho các thuộc tính ở phạm vi private.\r\n\r\nViệc sử dụng Setter và Getter cần thiết trong việc kiểm soát những thuộc tính quan trọng mà ta thường được sử dụng và yêu cầu giá trị chính xác. Ví dụ thuộc tính age lưu tuổi con người, thực tế thì phạm vi tuổi là từ 0 đến 100, thì ta không thể cho chương trình lưu giá trị age âm hoặc quá 100 được.\r\n\r\nChú ý\r\nKhi đã dùng setter và getter thì thuộc tính nên để private\r\nVì setter và getter nhằm quản lý truy cập của thuộc tính, thì ta không nên để thuộc tính có thể truy cập dễ dàng, không nên để ở dạng public.'),
(74, 15, 'Bài 23: Overriding và Overloading trong Java', 'HIz83AG7lYE', 1, 'Overriding là gì? Cách sử dụng\r\nOverriding (ghi đè) có nghĩa là có 2 phương thức giống nhau về tên và tham số truyền vào. Một phương thức ở lớp cha, còn cái kia ở lớp con. Overriding  cho phép lớp con có thể thực hiện riêng biệt cho phương thức mà lớp cha đã cung cấp.\r\n\r\nCách chống Overriding\r\nNếu không muốn lớp con có thể Overriding lại phương thức nào đó, ta sẽ sử dụng từ khóa final\r\nLớp con sẽ không thể Overriding được phương thức getInfo()'),
(75, 15, 'Bài 24: Trừu tượng trong Java', '9jlUoO3e2GY', 1, 'Tính trừu tượng là gì?\r\nMặc dù đây là bài viết lập trình, nhưng Kteam sẽ nói qua về ngôn ngữ học, rất nhiều người lập trình lâu năm đôi khi họ không thể hiểu bản chất từ trừu tượng\r\n\r\nTrừu tượng là một từ Hán Việt: ‘trừu’ nghĩa là rút ra, ‘tượng’ có nghĩa là hình tượng, tượng trưng. Vậy theo nghĩa bóng, trừu tượng có nghĩa là rút ra một khái niệm từ những hình tượng cụ thể, tạo ra một ý niệm trong suy nghĩ con người.\r\n\r\nTính trừu tượng trong lập trình hướng đối tượng là gì?\r\nTính trừu tượng trong lập trình hướng đối tượng là chỉ nêu ra vấn đề mà không hiển thị cụ thể, chỉ hiện thị tính năng thiết yếu đối với đối tượng người dùng mà không nói quy trình hoạt động. Ví dụ: như tạo ra tính năng gửi tin nhắn, ta chỉ cần hiểu là người dùng viết tin rồi nhấn gửi đi. Còn quy trình xử lý tin nhắn gửi như thế nào thì ta chưa đề cập đến.\r\n\r\nNhư vậy, tính trừu tượng là che giấu thông tin thực hiện từ người dùng, họ chỉ biết tính năng được cung cấp: Chỉ biết thông tin đối tượng thay vì cách nó sử dụng như thế nào. Nó có những ưu điểm sau:\r\n\r\nCho phép lập trình viên bỏ qua những phức tạp trong đối tượng mà chỉ đưa ra những khái niệm phương thức và thuộc tính cần thiết. Ta sẽ dựa những khái niệm đó để viết ra, nâng cấp và bảo trì.\r\nNó giúp ta tập trung cái cốt lõi đối tượng. Giúp người dùng không quên bản chất đối tượng đó làm gì.\r\n\r\nTính trừu tượng trong Java\r\nLớp trừu tượng\r\nLớp trừu tượng là lớp được khai báo mà không thể tạo ra đối tượng từ lớp đó. Ta sẽ tạo những lớp con kế thừa lớp trừu tượng.\r\n\r\nMục đích lớp trừu tượng là tạo ra lớp chung cho những lớp có liên quan với nhau kế thừa. Ví dụ khi xây dựng phần mềm quản lý nhà trường:  Những lớp sinh viên, giảng viên, cán bộ,… có những thuộc tính và phương thức chung như tên, năm sinh, quê quán,… thì ta sẽ tạo một lớp con người là lớp trừu tượng và những đặc điểm chung được để trong lớp con người. Khi phát triển chương trình, ta chỉ có thể tạo các đối tượng từ lớp con kế thừa lớp con người; không thể cho tạo đối tượng từ lớp con người được.\r\n\r\nPhương thức trừu tượng\r\nCác phương thức trừu tượng là là chỉ định nghĩa mà không có chương trình bên trong, lớp con kế thừa phải bắt buộc override nó lại để sử dụng. Phương thức trừu tượng có ý nghĩa định nghĩa phương thức bắt buộc phải có trong lớp con kế thừa.'),
(76, 15, 'Bài 25: Interface Java', 'BgNcBfqOLQk', 1, 'Interface là gì? Tại sao phải sử dụng?\r\nInterface là một kiểu dữ liệu tham chiếu trong Java. Nó là tập hợp các phương thức abstract (trừu tượng). Khi một lớp kế thừa interface, thì nó sẽ kế thừa những phương thức abstract của interface đó.\r\n\r\nMột số đặc điểm của interface:\r\n\r\nKhông thể khởi tạo, nên không có phương thức khởi tạo.\r\nTất cả các phương thức trong interface luôn ở dạng public abstract mà không cần khai báo.\r\nCác thuộc tính trong interface luôn ở dạng public static final mà không cần khai báo, yêu cầu phải có giá trị.\r\nMục đích của interface là để thay thế đa kế thừa lớp của những ngôn ngữ khác (ví dụ như C++, Python…). Ngoài ra, interface sẽ giúp đồng bộ và thống nhất trong việc phát triển hệ thống trao đổi thông tin.'),
(77, 15, 'Bài 26: Giải thích hàm main trong Java', 'nzurRJhbFl8', 1, 'Để đọc hiểu bài này, tốt nhất các bạn nên có kiến thức cơ bản về các phần sau:\r\n\r\nCÁC BIẾN TRONG JAVA.\r\nCÁC KIỂU DỮ LIỆU TRONG JAVA.\r\nCÁC HẠNG TOÁN TỬ TRONG JAVA\r\nCẤU TRÚC RẼ NHÁNH TRONG JAVA\r\nVÒNG LẶP WHILE TRONG JAVA\r\nVÒNG LẶP FOR TRONG JAVA\r\nMẢNG TRONG JAVA\r\nVÒNG LẶP FOR-EACH TRONG JAVA\r\nVAI TRÒ BREAK, CONTINUE TRONG VÒNG LẶP JAVA\r\nSWITCH TRONG JAVA\r\nLẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nCLASS TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nCÁC LOẠI PHẠM VI TRUY CẬP TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nTỪ KHÓA STATIC TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nTỪ KHÓA THIS TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nTHỪA KẾ TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nSETTER & GETTER TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nOVERRIDING VÀ OVERLOADING TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nTÍNH TRỪU TƯỢNG TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG\r\nINTERFACE TRONG LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG'),
(78, 15, 'Bài 27: Try catch trong Java', 'zI9uen-vRa4', 1, 'Try Catch là gì?\r\nKhi chạy chương trình, có rất nhiều loại lỗi khác nhau có thể xảy ra như: lỗi do sai lầm người viết, lỗi do sai thông tin đầu vào hoặc những lỗi mà không thể lường trước được. Và khi có lỗi, Java sẽ dừng lại và hiện thị thông tin lỗi ra, kĩ thuật đó thường được gọi là ‘throw an exception/error’.\r\n\r\nVà có những lỗi xuất phát từ người dùng, thì lúc đó ta không thể cho họ xem thông tin lỗi như thế này được. Với những người không thành thạo về máy vi tính hoặc tiếng Anh thì họ nghĩ chương trình bạn viết bị lỗi mà không phải lỗi từ họ.\r\n\r\nVì vậy, Try Catch có nhiệm vụ bắt (Catch) các lỗi mà thực tế có thể xảy ra để xử lý sao cho chương trình thân thiện với người dùng hơn.'),
(79, 15, 'Bài 28: 4 tính chất  của OOP', 'u-yPTK1pHQM', 1, 'Dẫn nhập\r\nTrong các bài học Java vừa qua, chúng ta đã tích lũy được những kiến thức cơ bản và hướng đối tượng của ngôn ngữ Java. Thực tế, kiến thức của một ngôn ngữ lập trình là không thể học hết được, ta chỉ có thể biết được nó qua những vấn đề dự án khi cần. Đây là bài học cuối trong khóa học này, nhưng là tiền đề để các bạn nghiên cứu những kiến thức nâng cao hơn.\r\n\r\n4 tính chất trong hướng đối tượng là gì?\r\nĐây là 4 tính chất góp phần tạo nên khái niệm lập trình hướng đối tượng, chúng có thể tồn tại trong các ngôn ngữ tuân theo hướng đối tượng, đặc biệt đối với những ngôn ngữ thuần hướng đối tượng như C++, Java, C#, Ruby,… sẽ có đủ 4 tính chất này.\r\n\r\nNếu bạn đã chọn các ngôn ngữ thuần hướng đối tượng gắn liền với sự nghiệp lập trình, thì bắt buộc bạn phải nhớ và hiểu các tính chất này, khi bạn hiểu mới có thể đi lên cao trong phát triển phần mềm đồng thời hiểu sâu trong kĩ thuật.\r\n\r\n4 tính chất đó là:\r\n\r\nTính đóng gói (Encapsulation)\r\nTính trừu tượng (Abstraction)\r\nTính thừa kế (Inheritance)\r\nTính đa hình (Polymorphism)\r\n'),
(80, 17, 'Day 1: Thiết kế Product Card bắt mắt chưa đầy 1 giờ', '3odtU8VL3Mc', 1, ''),
(81, 17, 'Day 2: Đứng hình mất 5s với Profile Card giới thiệu bản thân ', 'DkiLJzL6kv4', 1, ''),
(82, 17, 'Day 3: Bật mí cách tạo Modal Popup Material UI vừa đẹp vừa đơn giản', 'gyqMtCmHHUA', 1, ''),
(83, 17, 'Day 4: Hiệu ứng show ảnh Image Gallery chuyên nghiệp không phải ai cũng biết', '0Uhtzrsi-qE', 1, ''),
(84, 17, 'Day 5: Search Box đơn giản mà đẹp, không phải ai cũng biết', 'rpKjWpOiBSY', 1, ''),
(85, 17, 'Day 6: Những thông tin quan trọng khi bắt sự kiện keydown', 'p5ivn6UpjQk', 1, ''),
(86, 17, 'Day 7: Search Tags có gì hay ho ? ', 'Cad_2CvAoQ8', 1, ''),
(87, 17, 'Day 8: Validate form có tâm thế này mới đi làm được AE nhé', 'fRPCVBfD7hw', 1, ''),
(88, 17, 'Day 9: Đi làm thì phải biết dùng API vậy API là gì? Call API làm cực kỳ đơn giản trong Weather App', 'ZKhOuR1UWh4', 1, ''),
(89, 17, 'Day 10: Todo List bài tập kinh điển mà đi làm ai cũng phải biết. Kỹ thuật sử dụng \"This\" đơn giản', 'iO7kgGgHr6w', 1, ''),
(90, 14, 'Lập trình web cơ bản - buổi 32 - PHP & jQuery - Rating & Live search & JSON', '0M0AB3k4C4c', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#họclậptrình #php #mysql #đồán #javascript #jquery #json #rating #livesearch'),
(91, 14, 'Lập trình web cơ bản - buổi 33 - PHP & jQuery - Tags & Notify', 'i5SpM6mvCt4', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#họclậptrình #php #mysql #đồán #javascript #jquery #json #tags #notify #ajax'),
(95, 16, 'Test sửa video save drive', '1e1q_TJMqKxbUfmPzUkS1-tf3iYHFrg8W', 2, 'test sửa link'),
(96, 16, 'test link all', 'https://www.youtube.com/embed/41Xx_3-Wc7g', 3, 'test link loại khác'),
(97, 16, 'test link ytb', 'SJDM8ETMmzE', 1, 'test link ytb thôi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `price_buy` int(11) NOT NULL DEFAULT '99000',
  `rate` float DEFAULT '0',
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`id_order`, `id_user`, `id_course`, `price_buy`, `rate`, `comment`, `created_at`) VALUES
(13, 1, 15, 99000, 5, 'cái này xem hay lắm mọi người nên mua nha\r\n', '2022-01-21 06:09:02'),
(14, 1, 14, 99000, 4, 'cái này hay\r\n', '2022-01-21 06:09:02'),
(15, 1, 3, 99000, 5, 'Bài này hay nhưng mà ít quá giá mà có bạn nào hộ mình nhập data :))\r\n\r\n', '2022-01-21 06:09:02'),
(16, 1, 17, 99000, 3, 'mới mua nên chưa biết thế nào đánh giá tạm 3 sao vây\r\n', '2022-01-22 00:58:04'),
(19, 2, 3, 99000, 4, '                        Tình yêu thì muôn ngàn lối\r\nLàm sao để em tìm tới\r\nCứ bước qua một thời cảm thấy xa vời vợi\r\nNgười đâu có hay rằng em yêu người\r\nMà em không biết nói sao, quen biết bấy lâu\r\nTiếng ân tình em chưa dám trao\r\nNhiều khi em muốn nói ra nhưng khó biết bao\r\nVì em là con gái\r\nChưa từng ngỏ lời cùng ai\r\nTình này là tình vu vơ\r\nTình này là tình nhung nhớ\r\nĐêm đêm một mình em lặng lẽ với những giấc mơ\r\nEm mơ về anh rất nhiều từ khi vừa biết yêu\r\nTình này là tình xa xôi\r\nTình này là tình chưa tới\r\nChưa trao về anh nên chỉ mới biết ước mơ thôi\r\nƯớc mơ được có anh giờ đây để đừng tan theo khói mây\r\nTình yêu thì muôn ngàn lối\r\nLàm sao để em tìm tới\r\nCứ bước qua một thời\r\nCảm thấy xa vời vợi\r\nNgười đâu có hay rằng em yêu người\r\nMà em không biết nói sao, quen biết bấy lâu\r\nTiếng ân tình em chưa dám trao\r\nNhiều khi em muốn nói ra nhưng khó biết bao\r\nVì em là con gái\r\nChưa từng ngỏ lời cùng ai\r\nTình này là tình vu vơ\r\nTình này là tình nhung nhớ\r\nĐêm đêm một mình em lặng lẽ với những giấc mơ\r\nEm mơ về anh rất nhiều từ khi vừa biết yêu\r\nTình này là tình xa xôi\r\nTình này là tình chưa tới\r\nChưa trao về anh chỉ mới biết ước mơ thôi\r\nƯớc mơ được có anh giờ đây để đừng tan theo khói mây\r\nTình này là tình vu vơ\r\nTình này là tình nhung nhớ\r\nĐêm đêm một mình em lặng lẽ với những giấc mơ\r\nEm mơ về anh rất nhiều từ khi vừa biết yêu\r\nTình này là tình xa xôi\r\nTình này là tình chưa tới\r\nChưa trao về anh nên chỉ mới biết ước mơ thôi\r\nƯớc mơ được có anh giờ đây để đừng tan theo khói mây  \r\n\r\nYêu thầy nhiều <3\r\n                  ', '2022-01-22 19:56:17'),
(20, 2, 15, 99000, 5, 'em đang bận lắm lắm không học được huhu mọi người ơiii', '2022-01-22 23:51:50'),
(21, 2, 14, 99000, 3, 'mới mua về chưa học nên chưa biết tạm thời cho 3 * vậy hihi', '2022-01-24 08:07:20'),
(22, 3, 14, 99000, 5, 'hay', '2022-01-25 18:16:36'),
(25, 4, 15, 499000, 5, 'tesst đánh giá', '2022-02-07 14:34:38'),
(27, 4, 14, 950000, 0, NULL, '2022-02-11 04:13:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `update_course`
--

CREATE TABLE `update_course` (
  `id_lesson_update` int(11) NOT NULL,
  `id_lesson` int(11) DEFAULT NULL,
  `id_course` int(11) NOT NULL,
  `name_lesson` varchar(150) NOT NULL,
  `link` varchar(100) NOT NULL,
  `type_link` int(11) NOT NULL DEFAULT '1',
  `description_lesson` text,
  `action` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `update_course`
--

INSERT INTO `update_course` (`id_lesson_update`, `id_lesson`, `id_course`, `name_lesson`, `link`, `type_link`, `description_lesson`, `action`) VALUES
(1, NULL, 14, 'Đồ án Web cơ bản - Tâm sự', 'h_qgx1oLlgM', 1, 'adin pro :))', 2),
(2, 18, 3, 'SQL chuyên sâu - Buổi cuối - Thi vấn đáp', 'E6lizfokiWA', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink tổng hợp câu hỏi từ livestream\r\nhttps://j2c.cc/j2school-qa\r\n\r\n#sql', -1),
(5, 16, 3, 'SQL chuyên sâu - Buổi 6 - Chữa bài tập', 'xPllalzVL_4', 1, 'Link khoá học miễn phí\r\nhttps://j2teamnnl.teachable.com/courses\r\nLink chạy code online\r\nhttps://sqliteonline.com/\r\nLink tổng hợp kiến thức\r\nhttps://j2c.cc/learn_sql\r\n\r\n#sql #transaction', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(35) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `phone_number_user` varchar(15) NOT NULL,
  `image_user` varchar(150) DEFAULT 'null',
  `password` varchar(150) NOT NULL,
  `token_user` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `phone_number_user`, `image_user`, `password`, `token_user`) VALUES
(1, 'Công phạm nè', 'congpham@gmail.com', '0936933210', 'Cong Pham nè1642986810.jpg', 'cong', '68ab8e619170f7e26e71513c5e0a0019cf9a48f7'),
(2, 'Thiên an ', 'thienan@gmail.com', '0936933214', 'Thiên an 1642987204.jpg', 'cong', ''),
(3, 'Cong Pham', 'congphamtienthanh@gmail.com', '0396369665', 'null', 'cong', ''),
(4, 'Test lại', 'cong.test@gmail.com', '0936933214', 'Test chăng1644249252.jpg', 'cong', '6dd54be6ed514e482b4bdd8294db799ac6fe7903');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `view_history`
--

CREATE TABLE `view_history` (
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `view_history`
--

INSERT INTO `view_history` (`id_user`, `id_course`, `view`) VALUES
(1, 3, 1),
(1, 14, 35),
(1, 15, 1),
(1, 17, 1),
(2, 3, 1),
(2, 14, 1),
(2, 15, 1),
(3, 14, 1),
(4, 14, 1),
(4, 15, 4);

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
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_course` (`id_course`);

--
-- Chỉ mục cho bảng `update_course`
--
ALTER TABLE `update_course`
  ADD PRIMARY KEY (`id_lesson_update`),
  ADD KEY `id_course` (`id_course`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `view_history`
--
ALTER TABLE `view_history`
  ADD PRIMARY KEY (`id_user`,`id_course`),
  ADD KEY `id_course` (`id_course`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `oder`
--
ALTER TABLE `oder`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `update_course`
--
ALTER TABLE `update_course`
  MODIFY `id_lesson_update` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `oder_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `oder_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

--
-- Các ràng buộc cho bảng `update_course`
--
ALTER TABLE `update_course`
  ADD CONSTRAINT `update_course_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

--
-- Các ràng buộc cho bảng `view_history`
--
ALTER TABLE `view_history`
  ADD CONSTRAINT `view_history_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`),
  ADD CONSTRAINT `view_history_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
