<?php
// cancel.php

if (isset($_POST['cancel-button'])) {
    // Retrieve the order ID from the form submission
    $orderID = $_POST['orderID'];

    // Perform the deletion in the database
    require_once "../include/dbh.inc.php";
    $sql = "DELETE FROM orderitem WHERE checkoutID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $orderID);
        mysqli_stmt_execute($stmt);

        // Check if any rows were affected
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Deletion successful
            header('Location:../php/myorder.php');
        } else {
            // No rows affected
            echo "Order not found or already canceled.";
        }
    } else {
        // Error in the prepared statement
        echo "An error occurred while canceling the order.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
