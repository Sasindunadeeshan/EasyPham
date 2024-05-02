<?php
    session_start();
    require_once "../include/dbh.inc.php";

    // Check if the user email is available in the session
    if (isset($_SESSION['userEmail'])) {
        // Retrieve the email from the session
        $email = $_SESSION['userEmail'];

        // Delete the user from the database based on the email
        $deleteSql = "DELETE FROM users WHERE email = '$email'";
        mysqli_query($conn, $deleteSql);

        // Clear the session and redirect to the login page or handle it accordingly
        session_unset();
        session_destroy();
        header("Location: ../php/login.php"); // Redirect to the login page
        exit(); // Stop further execution of the code
    } else {
        // User email is not available in the session, handle it accordingly
        // Redirect to the login page or display an error message
        header("Location: ../php/login.php"); // Redirect to the login page
        exit(); // Stop further execution of the code
    }
?>
