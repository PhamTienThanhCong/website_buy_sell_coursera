## Cơ sở dữ liệu
- Phần mền sử dụng: My SQL

### Thiết kế 

- #### Bảng admin

| # | Tên | Kiểu dữ liệu | khóa | Chú Thích
--- | --- | --- | --- |--- 
| 1 | admin | int | Khóa chính | dữ liệu tự động tăng
| 2 | name_admin | không | varchar(35) | ghi tên của admin
| 3 | phone_number_admin | varchar(15) | không | kiểu unique
| 4 | address_admin | varchar(200) | không | ghi địa chỉ của admin
| 5 | image | varchar(150) | không | ghi tên ảnh
| 6 | status_admin | int | không | ghi trạng thái admin <br> với 0 là chờ xác nhận và 1 đã xác nhận 
| 7 | lever | int | không | ghi lever admin <br> với 0 là nhân viên và 1 là quản lý
| 8 | password | varchar(150) | không | là mật khẩu đăng nhập


- #### Bảng user

| # | Tên | Kiểu dữ liệu | khóa | Chú Thích
--- | --- | --- | --- |--- 
| 1 | id_user | int | khóa chính | dữ liệu tự động tăng
| 2 | name_user | không | varchar(35) | ghi tên của user
| 3 | phone_number_user | varchar(15) | không | kiểu unique
| 4 | image_user | varchar(150) | không | ghi tên ảnh
| 5 | password | varchar(150) | không | là mật khẩu đăng nhập
| 6 | token_user | text | không | là token đăng nhập tự động đăng nhập, <br> hoặc dùng để lấy lại mật khẩu


- #### Bảng course

| # | Tên | Kiểu dữ liệu | khóa | Chú Thích
--- | --- | --- | --- |--- 
| # | id_course | int | khóa chính | khiểu dữ liệu tự động tăng
| # | id_admin | int | khóa ngoại | là khóa ngoại nối đến [bảng admin]
| # | 1 | 2 | 3 | 4
| # | 1 | 2 | 3 | 4
| # | 1 | 2 | 3 | 4
| # | 1 | 2 | 3 | 4
| # | 1 | 2 | 3 | 4


[bảng admin]: https://github.com/PhamTienThanhCong/website_buy_sell_coursera/blob/main/document/db.md#b%E1%BA%A3ng-admin
