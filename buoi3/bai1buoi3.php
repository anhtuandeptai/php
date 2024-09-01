<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sách</title>
    <script>
        function validateForm() {
            var tenSach = document.forms["bookForm"]["ten_sach"].value;
            var tacGia = document.forms["bookForm"]["tac_gia"].value;
            var nhaXuatBan = document.forms["bookForm"]["nha_xuat_ban"].value;
            var namXuatBan = document.forms["bookForm"]["nam_xuat_ban"].value;

            if (tenSach == "" || tacGia == "" || nhaXuatBan == "" || namXuatBan == "") {
                alert("Tất cả các trường phải được điền đầy đủ.");
                return false;
            }
            
            if (isNaN(namXuatBan) || namXuatBan < 1000 || namXuatBan > new Date().getFullYear()) {
                alert("Vui lòng nhập năm xuất bản hợp lệ.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<?php
// Khai báo biến để lưu thông báo lỗi
$errorMsg = "";
$successMsg = "";

// Validate phía server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenSach = trim($_POST["ten_sach"]);
    $tacGia = trim($_POST['tac_gia']);
    $nhaXuatBan = trim($_POST['nha_xuat_ban']);
    $namXuatBan = trim($_POST['nam_xuat_ban']);

    // Kiểm tra các trường nhập
    if (empty($tenSach) || empty($tacGia) || empty($nhaXuatBan) || empty($namXuatBan)) {
        $errorMsg = "Tất cả các trường phải được điền đầy đủ.";
    } elseif (!is_numeric($namXuatBan) || $namXuatBan < 1000 || $namXuatBan > date("Y")) {
        $errorMsg = "Vui lòng nhập năm xuất bản hợp lệ.";
    } else {
        $successMsg = "Dữ liệu đã được gửi thành công!";
    }

    if (empty($errorMsg)) {
        // Hiển thị lại dữ liệu nếu không có lỗi
        echo "<h2>Thông Tin Sách:</h2>";
        echo "Tên sách: " . htmlspecialchars($tenSach) . "<br>";
        echo "Tác giả: " . htmlspecialchars($tacGia) . "<br>";
        echo "Nhà xuất bản: " . htmlspecialchars($nhaXuatBan) . "<br>";
        echo "Năm xuất bản: " . htmlspecialchars($namXuatBan) . "<br>";
    }
}
?>

<!-- Hiển thị thông báo lỗi hoặc thành công -->
<?php
if (!empty($errorMsg)) {
    echo "<p style='color:red;'>$errorMsg</p>";
} elseif (!empty($successMsg)) {
    echo "<p style='color:green;'>$successMsg</p>";
}
?>

<!-- Form nhập liệu -->
<form name="bookForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
    <label for="ten_sach">Tên sách:</label><br>
    <input type="text" id="ten_sach" name="ten_sach"><br><br>
    
    <label for="tac_gia">Tác giả:</label><br>
    <input type="text" id="tac_gia" name="tac_gia"><br><br>
    
    <label for="nha_xuat_ban">Nhà xuất bản:</label><br>
    <input type="text" id="nha_xuat_ban" name="nha_xuat_ban"><br><br>
    
    <label for="nam_xuat_ban">Năm xuất bản:</label><br>
    <input type="number" id="nam_xuat_ban" name="nam_xuat_ban"><br><br>
    
    <input type="submit" value="Gửi">
</form>

</body>
</html>
