<?php
$servername = "localhost";  // Đổi $_SERVERName thành $servername
$username = "root";
$password = "";
$dbname = "b5_mydb";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);  // In ra lỗi nếu kết nối thất bại
} else {
    echo "Kết nối thành công";
}


?>
