<h2 align="center">
  Tài liệu phân tích <br>
  Bán hàng (bán khóa học)
</h2>

## 1. Đối tượng sử dụng

### a. Khách hàng không có tài khoản
-	Tìm kiếm các khóa học
-	Xem chi tiết các khóa học
-	Đăng kí
-	Quản lý giỏ hàng(CRUD)

### b. Khách hàng có tài khoản
-	Có mọi quyền của khách hàng không có tài khoản
-	Đăng nhập và đăng xuất
-	Mua khóa học
-	Xem hóa đơn
-	Xem được các khóa học đã mua
-	Bình luận và đánh giá các khóa đã mua

### c. Người bán hàng(nhân viên):
-	Đăng nhập đăng xuất
-	Quản lý các khóa học(xem, thêm, sửa, xóa)
-	Phân tích trạng thái về lượt mua và lượt xem.

### d. Quản lý(admin):
-	Đầy đủ các chức năng của người bán hàng
-	Xác nhận các khóa học(khi bên nhân viên đăng lên): xóa hoặc xác nhận
-	Xóa vĩnh viễn hoặc khôi phục các khóa học mà bên người bán hàng đã xóa
-	Chặn hoặc bỏ chặn người bán hàng khi có sai phạm
-	Quản lý người tham gia (chặn, bỏ chặn)
-	Phân tích trạng thái về lượt mua và lượt xem của tất cả khóa học

## 2. Cấu trúc trang web

### a. khách hàng 
- Phần header & footer:
  - Gồm các thông tin của trang web (thông tin người dùng ,logo, bản quyền, …)
- Thanh chức năng ( Cố định bên trái ):
  - Trang chủ: chứa tất cả các khóa học.
  - Các khóa học đã mua (chỉ có khách hàng đăng nhập mới vào được)
  - Giỏ hàng và thanh toán
  - Cài đặt tài khoản (chỉ có khách hàng đăng nhập mới vào được) 
  - chi tiết:
 
- Trang chủ:
  - Có 2 phần chính: banner và các khóa học
  - banner cố định, là ảnh hoặc quảng cáo khóa học
  - Các khóa học bên dưới được xếp cạnh nhau, có thể theo tìm kiếm hoặc hiện tất cả
  - Khóa học:
    - Mỗi khóa học bao gồm ảnh, tên, số lượng bài học, tác giả, giá.
    - khi ấn vào xem chi tiết: có đầy đủ thông tin về khóa học, mô tả và đánh giá của người trước đó
   - khi xem khóa học chi tiết: 
     - hiện nút lựa chọn thêm vào giỏ hàng nếu chưa đặt.
     - hiện nút mua ngay nếu đã được thêm vào giỏ hàng.
     - hiện nút vào học ngay nếu đã mua khóa học.
     - khi đã mua hàng có thể đánh giá và nhận xét.  
 
- Các khóa học đã mua:
  - Chỉ có thể vào nếu như đã đăng nhập. Bị chuyển hướng sang trang đăng nhập nếu chưa đăng nhập
  - hiện tất cả khóa học mình đã mua. 
  - Có thể tìm kiếm từng khóa một.
  - các khóa học xếp cạnh nhau và hiện đủ thông tin về khóa học. chọn xem ngay để xem, đánh giá để đánh giá ngay
  - Xem khóa học:
    - có 2 phần chính: bài học hiện tại và tất cả bài học.
    - bài học hiện tại bao gồm: video bài học, sau đó đến tên và mô tả có thể có bình luận nếu có.
    - Tất cả bài học: bên trên có nút hoàn thành và tiếp tục nếu đã học xong. bên dưới hiện tất cả các bài học của khóa học.
    - lưu ý không thể xem những bài học mà bài trước đó chưa hoàn hành

- Giỏ hàng và thanh toán
  - có 4 phần chính:
  - Thông tin về giỏ hàng:
    - Là một bảng chứa thông tin về: tên khóa học, số lượng bài học, giá tiền, tác giả.
    - có 2 phím chức năng chính: phím checkbox để check xem có mua hàng hay không, phím xóa để xóa khóa học đã đặt
    - Tổng tiền: Tổng số tiền của các khóa học mình chọn mua
    - Thông báo giỏ hàng trống nếu chưa đặt mặt hàng nào
  - Thông tin khách hàng thanh toán:
    - khi chưa đăng nhập sẽ hiện chữ: "bạn phải đăng nhập để mua hàng"
    - khi đã đăng nhập
    - là thông tin cá nhân của khách hàng.
    - Hiện chữ đã xác nhận có thể thanh toán 
  - Thông tin về mặt hàng:
    - Số tiền phải trả.
    - số lượng khóa học đã đặt
  - Nút mua hàng ngay:
    - chỉ có hiệu lựu khi khách hàng đã đăng nhập 
 
- Cài đặt tài khoản:
  - Chỉ có thể vào nếu như đã đăng nhập. Bị chuyển hướng sang trang đăng nhập nếu chưa đăng nhập.
  - Có hai phần chính: Thông tin cá nhân và thông tin mua sắm của tài khoản.
  - Thông tin cá nhân:
    - bao gồm ảnh đại diện (nằm bên trái). Thông tin cá nhân Tên, Email, Số điện thoại và chỉ có thể đọc.
    - Có 2 nút ấn: Sửa đổi thông tin cá nhân, Thay đổi mật khẩu
    - Sửa thông tin cá nhân: các ô về Tên, email, số điện thoại, ảnh, mật khẩu sẽ được hiện lên, sửa đổi thông tin cá nhân và nhập mật khẩu để đổi. 
    - Thay đổi mật khẩu: các ô về mật khẩu cũ, mật khẩu mới và nhập lại mật khẩu sẽ hiện lên.
    - nếu nhập mật khẩu sai sẽ thông báo, nhập đúng sẽ thực thi
  - Thông tin mua sắm của tài khoản:
    - Ở bên trên hiện tổng quan: số khóa học đã mua, số tiền đã chi trả
    - Hiện chi tiết từng khóa học ở bên dưới: tên, ảnh, giá, ...





