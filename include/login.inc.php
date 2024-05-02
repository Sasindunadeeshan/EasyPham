<?php

if (isset($_POST["submit"])) {
    $email = $_POST["uid"];
    $password = $_POST["pwd"];

    require_once 'dbh.inc.php'; // Include the database connection file
    require_once 'functions.inc.php'; // Include the functions file

    // Check if the email and password match a user's credentials
    $user = loginUser($conn, $email, $password);

    if ($user === false) {
        header("Location: ../php/login.php?error=wrongLogin");
        exit();
    }

    // Start a session and store user data
    session_start();
    $_SESSION["userId"] = $user["id"];
    $_SESSION["userEmail"] = $user["email"];

    if ($user['role'] === 'Admin') {
        header("Location: ../php/admin.php");
        exit();
    }
    elseif ($user['role']==='Pharmecist'){
        header("Location: ../phamercist/index.php");
        exit();
    } 
    elseif($user['role']==='deliverBoy'){
        header("Location: ../phamercist/php/deliveryboy.php");
        exit();
    }
    elseif($user['role']===''){
        header("Location: ../php/index.php");
        exit();
    }
} else {
    header("Location: ../php/index.php");
    exit();
}
