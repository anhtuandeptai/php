<?php
include 'ketnoi.php'; // Include file ket noi

// Tạo bảng MyGuests
$sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Bảng MyGuests đã được tạo thành công!";
} else {
    echo "Lỗi khi tạo bảng: " . $conn->error;
}

$conn->close();
?>
