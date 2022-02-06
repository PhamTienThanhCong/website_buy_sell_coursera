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

### b. Người bán hàng, hay admin
- Phần header và footer chứa thẻ tìm kiếm, thông tin,...
- Thanh chức năng (Cố định bên trái):
  - Tổng quan,
  - Thêm khóa học mới
  - Khóa học của tôi
  - Cài đặt tài khoản
  - Đăng xuất
  
- Tổng quan:
  - Tổng quan về khóa học mà mình đăng lên
    - Số lượng khóa học đã được mua.
    - doanh thu tháng này.
    - Khóa học bán chạy nhất.
  
- Thêm khóa học mới:
  - bao gồm 2 phần chính: Nhập thông tin và xem trước
  - Nhập thông tin bao gồm: Tên, giá, tác giả, ảnh, mô tả
  - ghi đến đâu thì phần xem trước sẽ hiện lên ở đó.
  - sau khi ấn tạo khóa học xong ta chuyển sang phần chỉnh sửa khóa học chi tiết.
  - Lưu ý khi tạo khóa học xong cần admin xác nhận
 
- chỉnh sửa khóa học chi tiết:
  - Bao gồm tất cả 4 phần: Chỉnh sủa khóa học, thêm bài học, tất cả bài học, sửa bài học, xem trước bài học.
  - Chỉnh sửa khóa học:
    - Giống ở phần thêm khóa học mới, chỉ có điều ở đây các thông tin cũ đã được nhập sẵn
    - Có nút xóa khóa học, y/c nhập mật khẩu để xóa
  - Thêm bài học:
    - có các ô nhập các thông tin:
    - Tên bài học
    - link bài học !
    - Thể loại link. chỉ được chọn các thể loại: youtobe, driver, link trực tiếp
    - Mô tả về bài học
  - Tất cả khóa học:
    - Gồm 1 bảng chứa 7 thông tin chính: Số thứ tự, Tên bài học, link, Thể loại, xem trước bài học, sửa, xóa
    - chứa tất cả khóa học được chia thành 5 bài 1 trang. 
    - Xắp xếp them thứ tự được thêm gần nhất đến được thêm lâu nhất.
  - Sửa bài học:
    - luôn ẩn, chỉ hiện lên khi ấn vào sửa ở phần tất cả khóa học
    - hiện tất cả các thông tin của bài học mà ta ấn vào phần sửa
  - xem trước bài học
    - luôn ẩn, chỉ hiện lên khi ấn vào xem trước bài học ở phần tất cả khóa học.
    - hiện lên bài học, tên, mô tả,... để ta xem nó có lỗi hay không

- Khóa học của tôi:
  - Là một bảng gồm các thông tin: 
  - Thông tin của khóa học mà ta đã tạo. 
  - trạng thái bao gồm: đã xác nhận và chờ xác nhận.
  - chỉnh sửa khóa học chi tiết
  - Xem chi tiết: 
    - Tạo ra một trang ảo giống giao diện khách hàng để xem khóa học

- Cài đặt tài khoản:
  - Bao gồm 1 ảnh đại diện bên trái và thông tin cá nhân nằm bên cạnh ảnh đại diện
  - có 2 nút sửa thông tin và thay đổi mật khẩu
  - sửa thông tin: 
    - các thông tin cá nhân sẽ đổi thành các ô input để ta nhập
    - có thêm 1 ô nhập mật khẩu và nút lưu
  - thay đổi mật khẩu:
    - sẽ hiện lên 3 ô bao gồm: mật khẩu, mật khẩu mới, nhập lại mật khẩu mới
  - lưu ý nếu nhập sai mật khẩu sẽ bị lỗi

- Đăng xuất: tất nhiên là sẽ đăng xuất

[Người bán hàng, hay admin]: https://github.com/PhamTienThanhCong/website_buy_sell_coursera/blob/main/document/mo_ta.md#b-ng%C6%B0%E1%BB%9Di-b%C3%A1n-h%C3%A0ng-hay-admin

### c. Người quản lý, hay admin pro
- giao diện giống: [Người bán hàng, hay admin]
- ở phần thanh chức năng có thêm các phần: 
  - Tổng quan chung
  - quản lý khóa học
  - quản lý nhân sự, hay quản lý người bán hàng
  - quản lý người dùng

- Tổng quan chung:
  - Tổng số lượng khóa học được bán ra
  - Tổng doanh thu của tất cả admin,
  - 1 bảng tổng quan ghi: tên khóa học, tác giả, người đăng, ngày tạo, số lượng người học:
    - xắp xếp theo số lượng người học
  - ta có thể lựa chọn tổng quan theo: ngày, tháng, năm
 
- quản lý khóa học:
  - Chia thành 3 phần chính:
    - khóa học mới
    - khóa học đã xác nhận
    - khóa học đã xóa
  - ở đây ta có thể xem tất cả thông tin của khóa học, tuy nhiên ta không được phép thay đổi nội dung
  - các khóa học được chia 5 bài 1 trang
  - khóa học mới: 
    - sau khi xem có thể ấn xác nhận nếu đủ yêu cầu hoặc xóa nếu không đủ yêu cầu
  - khóa học đã xác nhận:
  - khóa học đã xóa:
    - là những khóa học mà người bán hàng đã xóa, ta có thể khôi phục nếu người bán hàng yêu cầu
  
- quản lý nhân sự: 
  - chứa đủ các thông tin của người bán hàng
  - chia thành 3 phần: người bán hàng đăng kí mới, người bán hàng đã xác nhận, người bán hàng đã bị cấm
  - người bán hàng đăng kí mới:
    - chứa đủ thông tin đăng kí,
    - ta có thể xác nhận hoặc từ chối
  - người bán hàng đã xác nhận: 
    - ta có thể cấm người bán hàng nếu có sai phạm
  - người bán hàng đã bị cấm:
    - ta có thể gỡ cấm người bán hàng

- quản lý người dùng:
  - số người dùng mới tham gia trong tháng này hoặc năm này.
  - có thể xem thông tin cơ bản của người dùng


  
