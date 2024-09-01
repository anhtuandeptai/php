<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sách</title>
</head>
<body>
    <form action ="bai0buoi3.php" method="post">
        <label>thông tin</label><br><br>
        <label for="tensach">tên sách </label>
        <input type="text" id="tensach" name="tensach" required><br><br>
        <label for="tentacgia">tên tác giả </label>
        <input type="text" id="tentacgia" name="tentacgia" required><br><br>
        <label>nhà xuất bản </label>
        <input type="text" id="nhaxuatban" name="nhaxuatban" required><br><br>
        <label>Năm xuất bản </label>
        <input type="number" id="namxuatban" name="namxuatban" required><br><br>
        
        <button type="submit" name="nopthongtin">nộp thông tin</button><br>
    </form>
    <?php
     if($_SERVER['REQUEST_METHOD']=="POST"){
    
        $tensach = $_POST['tensach'];
        $tentacgia = $_POST['tentacgia'];
        $nhaxuatban = $_POST['nhaxuatban'];
        $namxuatban = $_POST['namxuatban'];
      
        echo "<h1>tên sách : $tensach</h1>";
        echo "<h1>tên tác giả: $tentacgia</h1>";
        echo "<h1>nhà xuất bản: $nhaxuatban</h1>";
        echo "<h1>năm xuất bản: $namxuatban</h1>";
     }

    ?>

</body>
</html>