<!DOCTYPE html>
<html lang="en">
<head>
    <title>Deliveryboy dashboard</title>
    <link rel="Stylesheet" href="../css/h&f.css">
    <link rel="Stylesheet" href="../css/deliveryboy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
</head>
<body>
    <?php
    include "header.php"; // Header in site
    ?>
<div class="customerpage">
    <div class = "cidset">
        <div class = "pp">
            <img src = "../image/pharmacist.jpg" alt= "profile photo" >    <!--- Profile photo -->
        </div>
        
        <div class="cid">
            <p class = "id1">User ID: </p>
            <p class = "id2">CID000001</p>   <!-- Profile details -->
        </div>
            <p class ="id3">kalanavirajitha98@gmail.com</p>
    </div>

    <div class ="all">

        <p class ="pd">Profile Details:</p>

        <div class ="name">
            <p class ="n1">Name: </p>
            <div class ="fname">            
                <p class="fname1">First Name:</p>
                <input type ="text" class = "fname2"></input>
            </div>
            
            <div class ="lname">
                <p class ="lname1">Last Name:</p>
                <input type ="text" class = "lname2"></input>
            </div>
        </div>

        <div class ="address">
            <p class ="ad1">Address: </p>
            <input type ="text" class = "ad2"></input>
        </div>

        <div class ="email">
            <p class ="email1">Email: </p>
            <input type ="text" class ="email2"></input>
        </div>
        

        <div class ="telno">
            <p class ="tel1">Mobile No: </p>
            <input type ="text" class ="tel2"></p>
        </div>

        <button class = "b2">Update profile</button>
    </div>

    <div class ="fbutton">
        <div class ="fbutton1">
            <a href="Vieworder.php"><button class = "b1">View Order</button></a>
        </div>

        <div class ="fbutton2">
            <button class = "b4">Delete Account</button>
            <button class = "b5">Change Password</button>
        </div>
    </div>  

</div>
    <?php
        include "Cfooter.php";  
    ?>
</body>
</html>
<? mysqli_close($conn);?>