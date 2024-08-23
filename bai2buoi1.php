<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sách</title>
</head>
<body>
    <?php
    // Tổng số sách giả định
    $total = 100;
    // Số dòng hiển thị trên mỗi trang
    $rows = 10;

    // Xác định trang hiện tại từ query string, mặc định là 1
        $page = isset($_GET['p']) ? intval($_GET['p']) : 1;

    // Tính toán vị trí bắt đầu và kết thúc của các sách trong trang hiện tại
    $start = ($page - 1) * $rows + 1;
    $end = min($start + $rows - 1, $total);

    // Hiển thị bảng
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>STT</th><th>Tên sách</th><th>Nội dung sách</th></tr>";

    for ($i = $start; $i <= $end; $i++) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>TenSach" . $i . "</td>";
        echo "<td>NoiDung" . $i . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Tạo các nút chuyển trang
    echo "<div style='margin-top: 20px;'>";

    // Nút về trang trước
    if ($page > 1) {
        echo "<form style='display:inline;' method='get'>";
        echo "<input type='hidden' name='p' value='" . ($page - 1) . "'>";
        echo "<button type='submit'>Trang trước</button>";
        echo "</form> ";
    }

    // Nút về trang tiếp theo
    if ($end < $total) {
        echo "<form style='display:inline;' method='get'>";
        echo "<input type='hidden' name='p' value='" . ($page + 1) . "'>";
        echo "<button type='submit'>Trang sau</button>";
        echo "</form>";
    }

    echo "</div>";
    ?>
</body>
</html>

