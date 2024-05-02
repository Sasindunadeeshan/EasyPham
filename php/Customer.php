<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/Customer.css">
    <link rel="stylesheet" href="../css/h&f.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include "Header.php";
        require_once "../include/dbh.inc.php";

        // Check if the user email is available in the session
        if(isset($_SESSION['userEmail'])) {
            // Retrieve the email from the session
            $email = $_SESSION['userEmail'];

            // Retrieve user details from the database based
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            // Check if the user details exist
            if ($row) {
                $userID = $row['userID'];
                $name = $row['firstName'];
                $address = $row['address'];
                $province = $row['province'];
                $city = $row['city'];
                $postalCode = $row['postalCode'];
                $mobileNo = $row['phoneNum'];
            }
        } else {
            
            header("Location: login.php"); // Redirect to the login page
            exit(); 
        }

        // Update profile when the "Update profile" button is pressed
        if (isset($_POST['update'])) {
            
            $updatedName = $_POST['name'];
            $updatedAddress = $_POST['address'];
            $updatedProvince = $_POST['province'];
            $updatedCity = $_POST['city'];
            $updatedPostalCode = $_POST['postalCode'];
            $updatedMobileNo = $_POST['mobileNo'];

            // Update the database
            $updateSql = "UPDATE users SET firstName = '$updatedName', address = '$updatedAddress', province = '$updatedProvince', city = '$updatedCity', postalCode = '$updatedPostalCode', phoneNum = '$updatedMobileNo' WHERE email = '$email'";
            mysqli_query($conn, $updateSql);

            // Redirect to the profile page to see the updated information
            header("Location: Customer.php");
            exit(); 
        }
    ?>

    <div class="coscustomerpage">
        <!-- Profile form -->
        <form method="POST" action="">
            <div class="coscidset">
                <!-- Profile photo -->
                <div class="cospp">
                    <i class="fa fa-user-circle" style="font-size:170px"></i>
                </div>

                <div class="coscid">
                    <p class="cosid1">User ID: <?php echo $userID; ?></p>
                </div>
                
            </div>

            <div class="cosall">
                <p class="cospd">Profile Details</p>

                <div class="cosname">
                    <p class="cosn1">Name:</p>
                    <input type="text" class="cosn2" name="name" value="<?php echo $name; ?>" />
                </div>

                <div class="cosaddress">
                    <p class="cosad1">Address:</p>
                    <input type="text" class="cosad2" name="address" value="<?php echo $address; ?>" />
                </div>

                <div class="cosemail">
                    <p class="cosemail1">Email:</p>
                    <input type="text" class="cosemail2" name="email" value="<?php echo $email; ?>" disabled />
                </div>

                <div class="cosprovince">
                    <p class="cospr1">Province:</p>
                    <select class="cospr2" name="province">
                        <option selected><?php echo $province; ?></option>
                        <option>Central</option>
                        <option>Eastern</option>
                        <option>Northern</option>
                        <option>North Central</option>
                        <option>North Western</option>
                        <option>Sabaragamuwa</option>
                        <option>Southern</option>
                        <option>Uva</option>
                        <option>Western</option>
                    </select>
                </div>

                <div class="coscity">
                    <p class="cosc1">City:</p>
                    <input type="text" class="cosc2" name="city" value="<?php echo $city; ?>" />
                </div>

                <div class="cospc">
                    <p class="cospc1">Postal Code:</p>
                    <input type="text" class="cospc2" name="postalCode" value="<?php echo $postalCode; ?>" />
                </div>

                <div class="costelno">
                    <p class="costel1">Mobile No:</p>
                    <input type="text" class="costel2" name="mobileNo" value="<?php echo $mobileNo; ?>" />
                </div>

                <button type="submit" name="update" class="cosb2">Update profile</button>
            </div>
        </form>

        <div class="cosfbutton">
            <div class="cosfbutton1">
                <a href="myorder.php"><button class="cosb1">My Order</button></a>
            </div>

            <div class="cosfbutton2">
                <button onclick="confirmDelete()" class="cosb5">Delete Account</button>
                <script>
                    function confirmDelete() {
                        var confirmation = confirm("Are you sure you want to delete your account? This action cannot be undone.");
                        
                        if (confirmation) {
                            window.location.href = "../include/delete.inc.php";
                        }
                    }
                </script>
            </div>
        </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>
