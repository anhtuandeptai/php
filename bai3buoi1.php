<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>
    <h2>PHP Calculator</h2>

    <form method="POST">
        <label for="num1">Số thứ nhất:</label>
        <input type="number" name="num1" required><br><br>

        <label for="num2">Số thứ hai:</label>
        <input type="number" name="num2"><br><br>

        <button type="submit" name="action" value="add">Tính tổng</button>
        <button type="submit" name="action" value="subtract">Tính hiệu</button>
        <button type="submit" name="action" value="multiply">Tính tích</button>
        <button type="submit" name="action" value="divide">Tính thương</button><br><br>

        <button type="submit" name="action" value="is_prime">Kiểm tra số nguyên tố</button>
        <button type="submit" name="action" value="is_even">Kiểm tra số chẵn</button><br><br>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num1 = $_POST['num1'];
        $num2 = isset($_POST['num2']) ? $_POST['num2'] : null;
        $action = $_POST['action'];

        function add($a, $b) {
            return $a + $b;
        }

        function subtract($a, $b) {
            return $a - $b;
        }

        function multiply($a, $b) {
            return $a * $b;
        }

        function divide($a, $b) {
            if ($b == 0) {
                return "Không thể chia cho 0";
            }
            return $a / $b;
        }

        function is_prime($num) {
            if ($num < 2) {
                return false;
            }
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    return false;
                }
            }
            return true;
        }

        function is_even($num) {
            return $num % 2 == 0;
        }

        switch ($action) {
            case 'add':
                echo "Kết quả tổng: " . add($num1, $num2);
                break;
            case 'subtract':
                echo "Kết quả hiệu: " . subtract($num1, $num2);
                break;
            case 'multiply':
                echo "Kết quả tích: " . multiply($num1, $num2);
                break;
            case 'divide':
                echo "Kết quả thương: " . divide($num1, $num2);
                break;
            case 'is_prime':
                echo $num1 . (is_prime($num1) ? " là số nguyên tố" : " không phải là số nguyên tố");
                break;
            case 'is_even':
                echo $num1 . (is_even($num1) ? " là số chẵn" : " không phải là số chẵn");
                break;
        }
    }
    ?>
</body>
</html>
