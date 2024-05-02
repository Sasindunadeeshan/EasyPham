<?php

if(isset($_POST["submit"])){
    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $phoneNmb = $_POST["pNumber"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $province = $_POST["uid"];
    $postalCode = $_POST["Postalcode"];

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'functions.inc.php'; // Include the functions file

    // Check for empty inputs
    $emptyInputs = emptyInputsSignup($firstName, $lastName, $gender, $email, $password, $pwdrepeat, $phoneNmb, $address, $city, $province, $postalCode);
    $invalidEmail = invalidEmail($email); // Validate email format
    $pwdMatch = pwdMatch($password, $pwdrepeat); // Check if passwords match
    $emailExist = uidExist($conn, $email); // Check if email already exists in the database

    if ($emptyInputs !== false){
        header("Location: ../php/signin.php?error=emptyInput");
        exit();
    }

    if ($invalidEmail !== false){
        header("Location: ../php/signup.php?error=invalidEmail");
        exit();
    }
    
    if ($pwdMatch !== false){
        header("Location: ../php/signup.php?error=pwdDontMatch");
        exit();
    }
    
    if ($emailExist !== false){
        header("Location: ../php/signup.php?error=emailTaken");
        exit();
    }

    // Create user in the database
    insertUser($conn, $firstName, $lastName, $gender, $email, $password, $phoneNmb, $address, $city, $province, $postalCode);

    header('Location: ../php/login.php'); // Redirect to the login page
    exit();
}
?>
