<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phép tính </title>
</head>
<body>
    <h1>Phép tính</h1>
    <form action ="font.php" method="POST">
        <label>Chọn các phép tính</label>
        <input type ="radio" id="tong" name="tinhtoan" value="tong" required>
        <label for="tong">Cộng</label>
        <input type="radio" id="hieu" name="tinhtoan" value="hieu" required >
        <label for="hieu">Hiệu</label>
        <input type="radio" id="tich" name="tinhtoan" value="tich" required>
        <label for="tich">Tích</label>
        <input type="radio" id="thuong" name="tinhtoan" value="thuong" required>
        <label for="thuong">Thương</label><br><br>

       
        <label for="sothunhat">Số thứ nhất: </label>
        <input type="number" id="sothunhat" name="sothunhat" required><br><br>
        <label for="sothuhai">Số thứ hai: </label>
        <input type="number" id="sothuhai" name="sothuhai"><br><br>


        <button type="submit" name="caculate">calculate</button>
        

    </form>
    <?php
     if($_SERVER['REQUEST_METHOD']=="POST"){
        require 'back.php';
        $number1 = $_POST['sothunhat'];
        $number2 = $_POST['sothuhai'];
        $luachon = $_POST['tinhtoan'];
        $result = tinhtoan($number1,$number2,$luachon);
        echo "<h1>Resule: $result</h1>";
     }

    ?>

    
</body>
</html>