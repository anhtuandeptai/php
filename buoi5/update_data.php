<?php
include 'ketnoi.php'; // Include file kết nối

// Cập nhật firstname từ James thành Jane
$sql = "UPDATE MyGuests SET firstname='Jane' WHERE firstname='James'";

if ($conn->query($sql) === TRUE) {
    echo "Dữ liệu đã được cập nhật thành công!<br><br>";
} else {
    echo "Lỗi khi cập nhật dữ liệu: " . $conn->error . "<br><br>";
}

// Hiển thị lại danh sách sau khi cập nhật
$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Reg Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["email"]."</td><td>".$row["reg_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 kết quả";
}

$conn->close();
?>
