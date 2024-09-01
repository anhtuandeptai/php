<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt Upload Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"], .form-group input[type="email"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group .checkbox-group {
            display: flex;
            flex-wrap: wrap;
        }
        .form-group .checkbox-group label {
            flex: 1 1 45%;
            margin-bottom: 10px;
        }
        .form-group .checkbox-group input {
            margin-right: 10px;
        }
        .form-group .error {
            color: red;
            font-size: 0.875em;
        }
        .form-group .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Payment Receipt Upload Form</h2>
    <?php
    // Initialize variables to store form data and errors
    $firstName = $lastName = $email = $invoiceId = "";
    $payFor = [];
    $errors = [];

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate First Name
        if (empty($_POST["firstName"])) {
            $errors['firstName'] = "First Name is required.";
        } else {
            $firstName = cleanInput($_POST["firstName"]);
        }

        // Validate Last Name
        if (empty($_POST["lastName"])) {
            $errors['lastName'] = "Last Name is required.";
        } else {
            $lastName = cleanInput($_POST["lastName"]);
        }

        // Validate Email
        if (empty($_POST["email"])) {
            $errors['email'] = "Email is required.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        } else {
            $email = cleanInput($_POST["email"]);
        }

        // Validate Invoice ID
        if (empty($_POST["invoiceId"])) {
            $errors['invoiceId'] = "Invoice ID is required.";
        } elseif (!is_numeric($_POST["invoiceId"])) {
            $errors['invoiceId'] = "Invoice ID must be a number.";
        } else {
            $invoiceId = cleanInput($_POST["invoiceId"]);
        }

        // Validate Pay For
        if (empty($_POST["payFor"])) {
            $errors['payFor'] = "Please select at least one option.";
        } else {
            $payFor = $_POST["payFor"];
        }

        // If no errors, proceed with form processing
        if (empty($errors)) {
            echo '<p style="color: green;">Form submitted successfully!</p>';

            
        }
    }

    // Function to sanitize input data
    function cleanInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
    ?>

    <form id="paymentForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
            <div class="error"><?php echo $errors['firstName'] ?? ''; ?></div>
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
            <div class="error"><?php echo $errors['lastName'] ?? ''; ?></div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            <div class="error"><?php echo $errors['email'] ?? ''; ?></div>
        </div>

        <div class="form-group">
            <label for="invoiceId">Invoice ID</label>
            <input type="text" id="invoiceId" name="invoiceId" value="<?php echo $invoiceId; ?>">
            <div class="error"><?php echo $errors['invoiceId'] ?? ''; ?></div>
        </div>

        <div class="form-group">
            <label>Pay For</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="payFor[]" value="15K Category" <?php echo in_array('15K Category', $payFor) ? 'checked' : ''; ?>> 15K Category</label>
                <label><input type="checkbox" name="payFor[]" value="35K Category" <?php echo in_array('35K Category', $payFor) ? 'checked' : ''; ?>> 35K Category</label>
                <label><input type="checkbox" name="payFor[]" value="55K Category" <?php echo in_array('55K Category', $payFor) ? 'checked' : ''; ?>> 55K Category</label>
                <label><input type="checkbox" name="payFor[]" value="75K Category" <?php echo in_array('75K Category', $payFor) ? 'checked' : ''; ?>> 75K Category</label>
                <label><input type="checkbox" name="payFor[]" value="116K Category" <?php echo in_array('116K Category', $payFor) ? 'checked' : ''; ?>> 116K Category</label>
                <label><input type="checkbox" name="payFor[]" value="Shuttle Two Ways" <?php echo in_array('Shuttle Two Ways', $payFor) ? 'checked' : ''; ?>> Shuttle Two Ways</label>
                <label><input type="checkbox" name="payFor[]" value="Shuttle One Way" <?php echo in_array('Shuttle One Way', $payFor) ? 'checked' : ''; ?>> Shuttle One Way</label>
                <label><input type="checkbox" name="payFor[]" value="Compressport T-Shirt Merchandise" <?php echo in_array('Compressport T-Shirt Merchandise', $payFor) ? 'checked' : ''; ?>> Compressport T-Shirt Merchandise</label>
                <label><input type="checkbox" name="payFor[]" value="Training Cap Merchandise" <?php echo in_array('Training Cap Merchandise', $payFor) ? 'checked' : ''; ?>> Training Cap Merchandise</label>
                <label><input type="checkbox" name="payFor[]" value="Buf Merchandise" <?php echo in_array('Buf Merchandise', $payFor) ? 'checked' : ''; ?>> Buf Merchandise</label>
                <label><input type="checkbox" name="payFor[]" value="Other" <?php echo in_array('Other', $payFor) ? 'checked' : ''; ?>> Other</label>
            </div>
            <div class="error"><?php echo $errors['payFor'] ?? ''; ?></div>
        </div>

        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>

</body>
</html>
