<!DOCTYPE html>
<html lang="en">
<head>
    <title>pharmacist account</title>
    <link rel="stylesheet" href="../css/h&f.css">
    <link rel="stylesheet" href="../css/newpharmacist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
    <script>
        function showConfirmation() {
            alert("Profile updated successfully.");
        }
    </script>
</head>
<body>
<?php
    include "header.php"; // Header in site

    // Check if the user is logged in and has a valid session
    session_start();
    if (!isset($_SESSION['userEmail'])) {
        // Redirect the user to the login page or handle the unauthorized access as needed
        header("Location: login.php");
        exit();
    }

    // Retrieve the user's data from the database
    require_once '../../include/dbh.inc.php';

    // Handle the update profile form submission
    if (isset($_POST['updateProfile'])) {
        $newFirstName = $_POST['firstName'];
        $newLastName = $_POST['lastName'];
        $newAddress = $_POST['address'];
        $newPhoneNum = $_POST['phoneNum'];

        // Update the user's data in the database
        $updateSql = "UPDATE users SET firstName = ?, lastName = ?, address = ?, phoneNum = ? WHERE email = ?";
        $updateStmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($updateStmt, $updateSql)) {
            // Handle the SQL statement preparation error
            exit();
        }

        $userID = $_SESSION['userEmail'];
        mysqli_stmt_bind_param($updateStmt, "sssss", $newFirstName, $newLastName, $newAddress, $newPhoneNum, $userID);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);

        // Update the user's data in the current session
        $_SESSION['userFirstName'] = $newFirstName;
        $_SESSION['userLastName'] = $newLastName;

        // Call the JavaScript function to show the confirmation alert
        echo '<script>showConfirmation();</script>';
    }

    // Retrieve the user's data from the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Handle the SQL statement preparation error
        exit();
    }

    $userID = $_SESSION['userEmail'];
    mysqli_stmt_bind_param($stmt, "s", $userID);
    mysqli_stmt_execute($stmt);

    // Fetch the user's data
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $address = $row['address'];
        $email = $row['email'];
        $phoneNum = $row['phoneNum'];
    } else {
        // Handle the case where no matching user data is found
        // You can redirect the user to an error page or display a message
        echo "No user data found.";
        exit();
    }



    // Handle the delete account form submission
if (isset($_POST['deleteAccount'])) {
    // Delete the user's account from the database
    $deleteSql = "DELETE FROM users WHERE email = ?";
    $deleteStmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
        // Handle the SQL statement preparation error
        exit();
    }

    $userID = $_SESSION['userEmail'];
    mysqli_stmt_bind_param($deleteStmt, "s", $userID);
    mysqli_stmt_execute($deleteStmt);
    mysqli_stmt_close($deleteStmt);

    // Destroy the session and redirect the user to the login page
    session_destroy();
    header("Location: login.php");
    exit();
}


?>
    <div class="customerpage">
        <div class="cidset">
            <div class="pp">
                <img src="../image/pharmacist.jpg" alt="profile photo"> <!--- Profile photo -->
            </div>
        
            <div class="cid">
                <p class="id1">User ID: </p>
                <p class="id2">CID000001</p> <!-- Profile details -->
            </div>
            <p class="id3"><?php echo $email; ?></p>
        </div>

        <div class="all">
            <p class="pd">Profile Details</p>
            <form method="post" action="pharmacist.php">
                <div class="name">
                    <p class="n1">Name: </p>
                    <div class="fname">
                        <p class="fname1">First Name:</p>
                        <input type="text" class="fname2" name="firstName" value="<?php echo $firstName; ?>">
                    </div>
                
                    <div class="lname">
                        <p class="lname1">Last Name:</p>
                        <input type="text" class="lname2" name="lastName" value="<?php echo $lastName; ?>">
                    </div>
                </div>

                <div class="address">
                    <p class="ad1">Address: </p>
                    <input type="text" class="ad2" name="address" value="<?php echo $address; ?>">
                </div>

                <div class="email">
                    <p class="email1">Email: </p>
                    <input type="text" class="email2" value="<?php echo $email; ?>" disabled>
                </div>

                <div class="telno">
                    <p class="tel1">Mobile No: </p>
                    <input type="text" class="tel2" name="phoneNum" value="<?php echo $phoneNum; ?>">
                </div>

                <button class="b2" type="submit" name="updateProfile">Update profile</button>
            </form>
        </div>

        <div class="fbutton">
            <div class="fbutton1">
                <a href="../../php/order.php"><button class="b1">View Order</button></a>
                <a href="../../php/inven.php"><button class="b6">View Items</button></a>
            </div>

            <div class="fbutton2">
    <form method="post" onsubmit="return confirm('Are you sure you want to delete your account?');">
        <button class="b4" type="submit" name="deleteAccount">Delete Account</button>
    </form>
        </div>
        </div>  
    </div>

    <?php
    include "Cfooter.php";
    mysqli_close($conn);
    ?>
</body>
</html>
