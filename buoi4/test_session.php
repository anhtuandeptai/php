<?php
session_start();
if (isset($_SESSION['firstname'])) {
    echo "First Name: " . $_SESSION['firstname'] . "<br>";
    echo "Last Name: " . $_SESSION['lastname'] . "<br>";
    echo "Email: " . $_SESSION['email'] . "<br>";
    echo "Invoice ID: " . $_SESSION['invoice_id'] . "<br>";
    echo "Pay For: " . $_SESSION['payfor'] . "<br>";
    echo "Additional Info: " . $_SESSION['additional_info'] . "<br>";
} else {
    echo "No session data available.";
}
?>
