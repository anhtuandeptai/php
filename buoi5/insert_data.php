<?php
include 'ketnoi.php'; // Include file ket noi

// Chèn dữ liệu
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com'), 
               ('Jane', 'Smith', 'Jane@example.com'), 
               ('James', 'Johnson', 'James@example.com')
                 ('Emily', 'Brown', 'emily@example.com'), 
               ('Michael', 'Davis', 'michael@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "Dữ liệu đã được chèn thành công!";
} else {
    echo "Lỗi khi chèn dữ liệu: " . $conn->error;
}

$conn->close();
?>
