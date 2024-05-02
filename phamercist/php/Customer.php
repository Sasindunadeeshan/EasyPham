<!DOCTYPE html>
<html lang="en">
<head>
    <title> Customer Profile </title>
    <link rel = "Stylesheet" href = "../css/Customer.css">
    <link rel = "Stylesheet" href = "../css/h&f.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <?php
        include "Cheader.php";  
    ?>
<div class="customerpage">
    <div class = "cidset">
        <div class = "pp">
            <img src = "../image/Customer.jpg" alt= "profile photo" >    <!--- Profile photo -->
        </div>
        
        <div class="cid">
            <p class = "id1">User ID: </p>
            <p class = "id2">CID000001</p>   <!-- Profile details -->
        </div>
            <p class ="id3">kalanavirajitha98@gmail.com</p>
    </div>

    <div class ="all">

        <p class ="pd">Profile Details</p>

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
        
        <div class ="province">
            <p class ="pr1">Province: </p>
            <select class ="pr2">
                <option name ="Central">Central</option>
                <option name ="Eastern">Eastern</option>
                <option name ="Northern">Northern</option>
                <option name ="North Central">North Central</option>
                <option name ="North Western">North Western</option>
                <option name ="Sabaragamuwa">Sabaragamuwa</option>
                <option name ="Southern">Southern</option>
                <option name ="Uva">Uva</option>
                <option name ="Western">Western</option>
            </select>
        </div>

        <div class ="city">
            <p class ="c1">City: </p>
            <input type ="text" class ="c2"></p>
        </div>

        <div class ="pc">
            <p class ="pc1">Postal Code: </p>
            <input type ="text" class ="pc2"></p>
        </div>

        <div class ="telno">
            <p class ="tel1">Mobile No: </p>
            <input type ="text" class ="tel2"></p>
        </div>

        <button class = "b2">Update profile</button>
    </div>

    <div class ="fbutton">
        <div class ="fbutton1">
            <button class = "b1">My Order</button>
            <br>
            <button class ="b3">Feedback</button>

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