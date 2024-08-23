<?php
require 'xu_ly_mang.php';

$mang = [];
$phanTuCanKiemTra = null;
$giaTriLonNhat = $giaTriNhoNhat = $tong = $coTrongMang = $mangTangDan = $mangGiamDan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mang = array_map('intval', explode(',', $_POST['mang']));
    $phanTuCanKiemTra = intval($_POST['phanTu']);

    $giaTriLonNhat = timGiaTriLonNhat($mang);
    $giaTriNhoNhat = timGiaTriNhoNhat($mang);
    $tong = tinhTong($mang);
    $coTrongMang = kiemTraPhanTu($mang, $phanTuCanKiemTra);
    $mangTangDan = sapXepTangDan($mang);
    $mangGiamDan = sapXepGiamDan($mang);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Xử lý mảng</title>
</head>
<body>
    <div class="container">
        <h1>Nhập và xử lý mảng</h1>
        <form method="POST">
            <label for="mang">Nhập mảng (các phần tử cách nhau bằng dấu phẩy):</label><br>
            <input type="text" id="mang" name="mang" required><br><br>

            <label for="phanTu">Nhập phần tử cần kiểm tra:</label><br>
            <input type="number" id="phanTu" name="phanTu" required><br><br>

            <button type="submit">Xử lý</button>
        </form>

        <?php if (!empty($mang)): ?>
        <h2>Kết quả xử lý mảng</h2>
        <p><strong>Mảng đã nhập:</strong> <?php echo implode(', ', $mang); ?></p>
        <p><strong>Giá trị lớn nhất:</strong> <?php echo $giaTriLonNhat; ?></p>
        <p><strong>Giá trị nhỏ nhất:</strong> <?php echo $giaTriNhoNhat; ?></p>
        <p><strong>Tổng các phần tử:</strong> <?php echo $tong; ?></p>
        <p><strong>Phần tử <?php echo $phanTuCanKiemTra; ?> có trong mảng?</strong> <?php echo $coTrongMang ? 'Có' : 'Không'; ?></p>
        <p><strong>Mảng sau khi sắp xếp tăng dần:</strong> <?php echo implode(', ', $mangTangDan); ?></p>
   
        <?php endif; ?>
    </div>
</body>
</html>
