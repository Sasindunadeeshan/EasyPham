<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="pharmacistpart";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php

//$itemID = $_POST["itemID"];
    $fname = $_POST['first_name'];
    $lname = $_POST["last_name"];
    $oid =  $_POST["checkoutID"];
    $cid =  $_POST["userID"];  
    $telno= $_POST["Tel_no"];
    $Email = $_POST["Email"];
    $useraddress= $_POST["address"];

    $sql = "INSERT INTO confirmorder(first_name,last_name,checkoutID,userID,Tel_no,Email,address) VALUES ('$fname','$lname','$oid','$cid',' $telno','$Email','$useraddress')";

if(mysqli_query($conn, $sql)) {
    echo "<script>alert('Record Inserted Successfully!!');window.location.href = 'pharmacist.php';</script>";
} 
else {
    echo "<script>alert('Error in Insertion!!')</script>";
}
mysqli_close($conn);

?>