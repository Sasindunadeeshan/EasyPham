<?php
include_once "adminheader.php";
//database connection
require_once 'dbh.inc.php';

//Handle form submission
if (isset($_POST["submit"])) {
    //Validate and sanitize the form data
    $firstName = $_POST["emp-name"];
    $lastName = $_POST["emp-name"];
    $password = $_POST["emp-id"];
    $address = $_POST["address"];
    $phoneNum = $_POST["position"];
    $position = $_POST["position"];
    $email = $_POST["email"];

    // Perform validation and sanitization as needed

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    $sql = "INSERT INTO users (firstName, lastName, password, address, phoneNum, position, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $firstName, $lastName, $hashedPassword, $address, $phoneNum, $position, $email);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}
?>
