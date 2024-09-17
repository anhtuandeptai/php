<!DOCTYPE html>
<div class="form-group submit">
    <input type="submit" name="submit" value="Submit">
</div><html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script src="bai1buoi4.js"></script>
    <link rel = "stylesheet" href="bai1buoi4.css">
   
</head>

<body>
    <h1>Payment Receipt Upload Form</h1>
    <form name="myForm" method="post" action="bai1buoi4.php" class="form-container" onsubmit="return validateForm()" enctype="multipart/form-data">

        <div class="form-group">
        <input type="text" id="firstname" name="firstname" placeholder="Enter First Name" value="<?php echo isset($_COOKIE['firstname']) ? $_COOKIE['firstname'] : ''; ?>">
            <label for="firstname">First Name</label>
        </div>

        <div class="form-group">
        <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?php echo isset($_COOKIE['lastname']) ? $_COOKIE['lastname'] : ''; ?>">
            <label for="lastname">Last Name</label>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
        </div>

        <div class="form-group">
            <label for="invoice_id">Invoice ID</label>
            <input type="text" id="invoice_id" name="invoice_id" placeholder="Enter Invoice ID">
        </div>

      

        <fieldset class="form-group-full">
            <legend style="font-weight: bold;">Pay For:</legend>
            <div class="group-pay">
                <div>
                    <input type="checkbox" id="ct1" name="payfor[]" value="Ct1">
                    <label for="ct1">15K Category</label><br>
                    <input type="checkbox" id="ct2" name="payfor[]" value="Ct2">
                    <label for="ct2">55K Category</label><br>
                    <input type="checkbox" id="ct3" name="payfor[]" value="Ct3">
                    <label for="ct3">116K Category</label><br>
                    <input type="checkbox" id="ct4" name="payfor[]" value="Ct4">
                    <label for="ct4">Shuttle Two Ways</label><br>
                    <input type="checkbox" id="ct5" name="payfor[]" value="Ct5">
                    <label for="ct5">Compressport T-shirt Merchandise</label><br>
                    <input type="checkbox" id="ct6" name="payfor[]" value="Ct6">
                    <label for="ct6">Other</label>
                </div>
                <div>
                    <input type="checkbox" id="ct7" name="payfor[]" value="Ct7">
                    <label for="ct7">35K Category</label><br>
                    <input type="checkbox" id="ct8" name="payfor[]" value="Ct8">
                    <label for="ct8">75K Category</label><br>
                    <input type="checkbox" id="ct9" name="payfor[]" value="Ct9">
                    <label for="ct9">Shuttle One Way</label><br>
                    <input type="checkbox" id="ct10" name="payfor[]" value="Ct10">
                    <label for="ct10">Training Cap Merchandise</label><br>
                    <input type="checkbox" id="ct11" name="payfor[]" value="Ct11">
                    <label for="ct11">Buff Merchandise</label>
                </div>
            </div>
        </fieldset>

        <div class="form-group-auto-size">
            <label for="payment_image">Please upload your payment receipt</label>
            <input type="file" id="payment_image" name="payment_image" accept="image/*">
        </div>

        <div class="form-group-auto-size">
            <label for="additional_info">Additional Information</label>
            <textarea id="additional_info" name="additional_info" placeholder="Type here..."></textarea>
        </div>

        <div class="form-group submit">
            <input type="submit" name="submit" value="Submit">
        </div>
        
    </form>

</body>

</html>