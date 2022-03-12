## Cơ sở dữ liệu

- Phần mền sử dụng: My SQL

### Thiết kế

- #### 1. Bảng admin

| #   | Tên                | Kiểu dữ liệu | khóa | Chú Thích                                                                                                                   |
|-----|--------------------| --- | --- |-----------------------------------------------------------------------------------------------------------------------------|
| 1   | id_admin           | int | Khóa chính | dữ liệu tự động tăng                                                                                                        |
| 2   | name_admin         | varchar(35) | không | ghi tên của admin                                                                                                           |
| 3   | email_admin        | varchar(150) | không | kiểu unique                                                                                                                 |
| 4   | phone_number_admin | varchar(15) | không | kiểu unique                                                                                                                 |
| 5   | address_admin      | varchar(200) | không | ghi địa chỉ của admin                                                                                                       |
| 6   | image              | varchar(150) | không | ghi tên ảnh, mặc định là null                                                                                               |
| 7   | status_admin       | int | không | ghi trạng thái admin <br> với 0 là chờ xác nhận, 1 đã xác nhận và -1 là đang chặn                                           |
| 8   | lever              | int | không | ghi lever admin <br> với 0 là nhân viên và 1 là quản lý                                                                     |
| 9   | password           | varchar(150) | không | là mật khẩu đăng nhập                                                                                                       |
| 10  | token_admin           | text | không | là token đảm bảo chỉ có 1 thiết bị đăng nhập,<br> có thể vô hiệu đăng nhập từ admin pro, <br> hoặc dùng để lấy lại mật khẩu |

- #### 2. Bảng user

| #   | Tên | Kiểu dữ liệu | khóa | Chú Thích                                                                |
|-----| --- | --- | --- |--------------------------------------------------------------------------|
| 1   | id_user | int | khóa chính | dữ liệu tự động tăng                                                     |
| 2   | name_user | không | varchar(35) | ghi tên của user                                                         |
| 3   | email_user | varchar(150) | không | kiểu unique                                                              |
| 4   | phone_number_user | varchar(15) | không | kiểu unique                                                              |
| 5   | image_user | varchar(150) | không | ghi tên ảnh, mặc định là null                                            |
| 6   | password | varchar(150) | không | là mật khẩu đăng nhập                                                    |
| 7   | token_user | text | không | là token đăng nhập tự động đăng nhập, <br> hoặc dùng để lấy lại mật khẩu |

- #### 3. Bảng course

| #   | Tên | Kiểu dữ liệu | khóa | Chú Thích                                                                     |
|-----| --- | --- | --- |-------------------------------------------------------------------------------|
| 1   | id_course | int | khóa chính | khiểu dữ liệu tự động tăng                                                    |
| 2   | id_admin | int | khóa ngoại | là khóa ngoại nối đến [bảng admin]                                            |
| 3   | name_course | varchar(100) | không | tên của khóa học                                                              |
| 4   | description_course | text | không | ghi mô tả về khóa học                                                         |
| 5   | author | varchar(30) | không | tên tác giả                                                                   |
| 6   | image_course | varchar(150) | không | ghi tên ảnh                                                                   |
| 7   | status_course | int | không | ghi trạng thái khóa học: <br>0: là đang chờ, 1 là đã xác nhận, -1 là xóa(giả) |
| 8   | price | int | không | ghi giá của khóa học, price >= 0                                              |
| 9   | created_at | timestamp | không | ghi thời gian tạo của khóa học                                                |

- #### 4. Bảng lesson

| #   | Tên | Kiểu dữ liệu | khóa | Chú Thích                                                                        |
|-----| --- | --- | --- |----------------------------------------------------------------------------------|
| 1   | id_lesson | int | khóa chính | khiểu dữ liệu tự động tăng                                                       |
| 2   | id_course | int | khóa ngoại | là khóa ngoại nối đến [bảng course]                                              |
| 3   | name_lesson | varchar(100) | không | tên của bài học                                                                  |
| 4   | link | varchar(50) | khum | là link để nhúng                                                                 |
| 5   | type_link | int | không | thể loại link nhúng(3 loại) <br> 1 = link youtube, 2 = link driver, 3 = all link |
| 6   | description_lesson | text | không | ghi mô tả về khóa học                                                            |

- #### 5. Bảng order

| #   | Tên | Kiểu dữ liệu | khóa | Chú Thích                        |
|-----|---|---|---|----------------------------------|
| 1   | id_order | int | khóa chính | khóa chính tự động tăng          |
| 2   | id_user | int | khóa ngoại | khóa ngoại nối tới [bảng user]   |
| 3   | id_course | int | khóa ngoại | khóa ngoại nối tới [bảng course] |
| 4   | price_buy | int | không | giá khi mua hàng                 |
| 5   | rate | float | không | đánh giá, từ 0 -> 5              |
| 6   | comment | text | không | bình luận khi mua hàng           |
| 7   | created_at | timestamp | không | thời gian khi mua hàng0          |

- #### 6. Bảng view_history

| #   | Tên | Kiểu dữ liệu | khóa | Chú Thích                        |
|-----| --- | --- | --- |----------------------------------|
| 1   | id_user | int | khóa chính và khóa ngoại | khóa ngoại nối tới [bảng user]   |
| 2   | id_course | int | khóa chính và khóa ngoại | khóa ngoại nối tới [bảng course] |
| 3   | view | int | không | lịch sử xem, mặc định là 1       |

- #### 7. Bảng update_course 

| #     | Tên | Kiểu dữ liệu | khóa | Chú Thích                                                                                               |
|-------| --- | --- | --- |---------------------------------------------------------------------------------------------------------|
| 1     | id_lesson | int | khóa chính và khóa ngoại | khóa ngoại nối đến [bảng lesson]                                                                        |
| 2     | id_course | int | khóa ngoại | là khóa ngoại nối đến [bảng course]                                                                     |
| 3     | name_lesson | varchar(100) | không | tên của bài học                                                                                         |
| 4     | link | varchar(50) | khum | là link để nhúng                                                                                        |
| 5     | type_link | int | không | thể loại link nhúng(3 loại) <br> 1 = link youtube, 2 = link driver, 3 = all link                        |
| 6     | description_lesson | text | không | ghi mô tả về khóa học                                                                                   |
| 7     | action | int | không | Ghi hành động muốn thực hiện <br> 0: mặc định,không thông báo cho admin,1: cập nhập, 2: thêm và -1: xóa |

## Sơ đồ thực thể:

![alt text](https://raw.githubusercontent.com/PhamTienThanhCong/website_buy_sell_coursera/main/document/so_do.png)
<!-- https://raw.githubusercontent.com/PhamTienThanhCong/website_buy_sell_coursera/main/document/so_do.png -->

[bảng admin]: https://github.com/PhamTienThanhCong/website_buy_sell_coursera/blob/main/document/db.md#b%E1%BA%A3ng-admin

[bảng user]: https://github.com/PhamTienThanhCong/website_buy_sell_coursera/blob/main/document/db.md#b%E1%BA%A3ng-user

[bảng course]: https://github.com/PhamTienThanhCong/website_buy_sell_coursera/blob/main/document/db.md#b%E1%BA%A3ng-course

[bảng lesson]: https://github.com/PhamTienThanhCong/website_buy_sell_coursera/blob/main/document/db.md#b%E1%BA%A3ng-lesson
