<?php
session_start();
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$firstNameErr = $lastNameErr = $emailErr = $invoiceIdErr = $payForErr = $additionalInfoErr = "";
$firstName = $lastName = $email = $invoiceId = "";
$payFor = [];
$additionalInfo = "";

// Kiểm tra nếu có cookies lưu sẵn thông tin
if (isset($_COOKIE["firstName"])) {
    $firstName = $_COOKIE["firstName"];
}
if (isset($_COOKIE["lastName"])) {
    $lastName = $_COOKIE["lastName"];
}
if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate First Name
    if (empty($_POST["firstName"])) {
        $firstNameErr = "Error: First Name is required.";
    } else {
        $firstName = sanitize_input($_POST["firstName"]);
        if (!preg_match("/^[\p{L}\s]+$/u", $firstName)) {
            $firstNameErr = "Error: First Name should only contain letters and spaces.";
        } else {
            // Thiết lập cookie cho First Name
            setcookie("firstName", $firstName, time() + (86400 * 30), "/"); // Lưu cookie trong 30 ngày
        }
    }

    // Validate Last Name
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Error: Last Name is required.";
    } else {
        $lastName = sanitize_input($_POST["lastName"]);
        if (!preg_match("/^[\p{L}\s]+$/u", $lastName)) {
            $lastNameErr = "Error: Last Name should only contain letters and spaces.";
        } else {
            setcookie("lastName", $lastName, time() + (86400 * 30), "/"); // Lưu cookie trong 30 ngày
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Error: Email is required.";
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Error: A valid Email is required.";
        } else {
            setcookie("email", $email, time() + (86400 * 30), "/");
        }
    }

    // Validate Invoice ID
    if (empty($_POST["invoiceId"])) {
        $invoiceIdErr = "Error: Invoice ID is required.";
    } else {
        $invoiceId = sanitize_input($_POST["invoiceId"]);
        if (!is_numeric($invoiceId)) {
            $invoiceIdErr = "Error: Invoice ID must be a number.";
        }
    }

    // Validate Pay For
    if (empty($_POST["payFor"])) {
        $payForErr = "Error: At least one 'Pay For' option must be selected.";
    } else {
        $payFor = $_POST["payFor"];
    }

    // Validate Additional Info
    if (empty($_POST["additionalInfo"])) {
        $additionalInfoErr = "";
    } else {
        $additionalInfo = sanitize_input($_POST["additionalInfo"]);
    }

    // Hiển thị kết quả hoặc lỗi
    if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($invoiceIdErr) && empty($payForErr) && empty($additionalInfoErr)) {
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['email'] = $email;
        $_SESSION['invoiceId'] = $invoiceId;
        $_SESSION['payFor'] = implode(', ', $payFor);
        $_SESSION['additionalInfo'] = $additionalInfo;

        echo "Session First Name: " . $_SESSION['firstName'] . "<br>";
        echo "Session Last Name: " . $_SESSION['lastName'] . "<br>";
        echo "Session Email: " . $_SESSION['email'] . "<br>";
        echo "Session Invoice ID: " . $_SESSION['invoiceId'] . "<br>";
        echo "Session Pay For: " . $_SESSION['payFor'] . "<br>";
        echo "Session Additional Info: " . $_SESSION['additionalInfo'] . "<br>";
    } else {
        echo "<span style='color:red;'>$firstNameErr</span><br>";
        echo "<span style='color:red;'>$lastNameErr</span><br>";
        echo "<span style='color:red;'>$emailErr</span><br>";
        echo "<span style='color:red;'>$invoiceIdErr</span><br>";
        echo "<span style='color:red;'>$payForErr</span><br>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
    }

    // Xử lý file upload
    $targetDir = "uploads/";
    $uploadOk = 1;
    $allowedFileTypes = array("jpg", "jpeg", "png", "gif");

    if (isset($_FILES["paymentReceipt"])) {
        $targetFile = $targetDir . basename($_FILES["paymentReceipt"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["paymentReceipt"]["tmp_name"]);
        if ($check !== false) {
            echo "File là ảnh - " . $check["mime"] . ".";
        } else {
            echo "File không phải là ảnh.";
            $uploadOk = 0;
        }

        if (file_exists($targetFile)) {
            echo "Xin lỗi, file đã tồn tại.";
            $uploadOk = 0;
        }

        if ($_FILES["paymentReceipt"]["size"] > 2000000) {
            echo "Xin lỗi, file của bạn quá lớn.";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, $allowedFileTypes)) {
            echo "Xin lỗi, chỉ cho phép các file JPG, JPEG, PNG và GIF.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Xin lỗi, file của bạn không được upload.";
        } else {
            if (move_uploaded_file($_FILES["paymentReceipt"]["tmp_name"], $targetFile)) {
                echo "File " . htmlspecialchars(basename($_FILES["paymentReceipt"]["name"])) . " đã được upload thành công.";
            } else {
                echo "Xin lỗi, đã xảy ra lỗi khi upload file của bạn.";
            }
        }
    }
}
?>
