<?php
// Kiểm tra xem form đã được gửi đi chưa
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Lấy giá trị từ form
      $username = $_POST["username"];
      $password = $_POST["password"];

      // Kiểm tra tính hợp lệ của tên đăng nhập và mật khẩu (ở đây chỉ là ví dụ đơn giản)
      if ($username == "admin" && $password == "password") {
         // Đăng nhập thành công
         echo "Đăng nhập thành công!";
      } else {
         // Đăng nhập không thành công
         echo "Tên đăng nhập hoặc mật khẩu không chính xác!";
      }
   }
?>
