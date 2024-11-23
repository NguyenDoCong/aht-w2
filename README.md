# aht-w2

## đăng nhập

### Chức năng chính:

- Hiển thị trang quản lý

### Một người dùng bao gồm các thành phần

- id
- username
- password

## đăng ký

### Chức năng chính:

- Thêm một người dùng mới

### Model:

- Lớp User: Đại diện cho một user
- Lớp UserDB: Chứa các phương thức để làm việc với CSDL

### View:

- File login.php: Chứa form đăng nhập
- File register.php: Chứa form thêm một user mới

### Controller:

- Lớp UserController: Chứa các phương thức để xử lý các thao tác của người dùng

## Database

### Tạo bảng User bao gồm các cột:

- id: integer - tự tăng
- username: varchar
- password: varchar

## Chức năng

### Chức năng 1: Đăng ký tài khoản

- Bước 1: Tạo class DBConnection Model
- Bước 2: Tạo Class User Model đại điện cho một user
- Bước 3: Tạo phương thức create trong file model/UserDB thực hiện insert dữ liệu vào database
- Bước 4: Trong controller/UserController.php tạo 2 phương thức
  - Phương thức khởi tạo \_\_construct() khai báo kết nối cơ sở dữ liệu
  - Phương thức add() trả về view add.php khi method là GET và thực hiện thêm mới task khi method là POST
- Bước 5: Tạo form đăng ký tài khoản
- Bước 6: Điều hướng đến trang đăng ký trong trang login.php

### Chức năng 2: Đăng nhập

- Bước 1: Tạo phương thức get trong file model/UserDB và trả về 1 user
- Bước 2: Trong controller/UserController.php tạo phương thức index() trả về view index.php khi nhập đúng username, password, báo lỗi nếu nhập sai
- Bước 5: Tạo form đăng nhập

## quản lý

### Chức năng chính:

- Xem công việc (View todos): Hiển thị danh sách công việc của người dùng đã đăng nhập.
- Thêm công việc (Add todo): Người dùng có thể thêm công việc với các thông tin như: Tiêu đề, Trạng - thái, Nội dung công việc.
- Chỉnh sửa công việc (Edit todo): Người dùng có thể thay đổi thông tin công việc.
- Xóa công việc (Delete todo): Người dùng có thể xóa công việc khỏi danh sách.

### Một task bao gồm các thành phần

- id: Id của task
- title: Tên của task
- status: 'incomplete' hoặc 'completed'
- content: Mô tả chi tiết của công việc

## MVC

### Model:

- Lớp User: Đại diện cho một user
- Lớp Task: Đại diện cho một task
- Lớp UserDB: Chứa các phương thức để làm việc với CSDL
- Lớp TaskDB: Chứa các phương thức để làm việc với CSDL

### View:

- File list.php: Hiển thị danh sách task, bao gồm: Tên, email, address của task
- File add.php: Chứa form thêm một task mới
- File edit.php: Chứa form chỉnh sửa một task
- File delete.php: Chứa form để xoá một task
- File view.php: Hiển thị nội dung chi tiết của một task

### ontroller:

- Lớp CustomerController: Chứa các phương thức để xử lý các thao tác của người dùng

## **Database**

### Tạo bảng customers bao gồm các cột:

- **id**: integer - tự tăng
- **name**: varchar
- **email**: varchar
- **address**: varchar

## Chức năng

### **Chức năng 1: Thêm mới task**

- Bước 1: Tạo class DBConnection Model
- Bước 2: Tạo Class Customer Model đại điện cho một task
- Bước 3: Tạo phương thức create trong file model/CustomerDB thực hiện insert dữ liệu vào database
- Bước 4: Trong controller/CustomerController.php tạo 2 phương thức

* Phương thức khởi tạo \_\_construct() khai báo kết nối cơ sở dữ liệu
* Phương thức add() trả về view add.php khi method là GET và thực hiện thêm mới task khi method là POST

- Bước 5: Tạo form thêm mới task
- Bước 6: Điều hướng đến trang add trong trang index.php
