<?php
include 'ketnoi.php'; // Include file ket noi

// Xóa nhân viên có id là 3
$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Dữ liệu đã được xóa thành công!";
} else {
    echo "Lỗi khi xóa dữ liệu: " . $conn->error;
}

// Hiển thị lại danh sách sau khi xóa
include 'display_data.php';

$conn->close();
?>
