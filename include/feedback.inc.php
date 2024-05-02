<?php
// Check if the form is submitted
if (isset($_POST['submit-feedback'])) {
    // Retrieve the form data
    $username = $_POST['email'];
    $orderID = $_POST['orderID'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    $recommend = $_POST['recommend'];

    // Validate the form data (perform any necessary validation checks)

    // Update the database with the feedback
    require_once 'dbh.inc.php'; // Include the database connection

    // Prepare the SQL statement
    $sql = "INSERT INTO feedback (email, orderID, rating, FeedBack, recommendation) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters to the statement
        mysqli_stmt_bind_param($stmt, "sisss", $username, $orderID, $rating, $feedback, $recommend);

        // Execute the statement
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            // Feedback inserted successfully
            header('Location:../php/myorder.php');
        } else {
            // Failed to insert feedback into the database
            echo "Oops! Something went wrong. Please try again.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Failed to prepare the SQL statement
        echo "Oops! Something went wrong. Please try again.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
