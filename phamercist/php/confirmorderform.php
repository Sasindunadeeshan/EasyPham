<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/h&f.css">
  <!--header css-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/confirmorder.css">
  <title>Sign in</title>

</head>

<?php include "header.php"; ?>

<body>
<?php //include('confirmordersignup.php'); ?>
  <div class="sin-signinbox">

    <h1>Order Confirmation</h1>
    <form action="confirmordersignup.php" method="POST">
      <div class="sin-input-group">
        
        <p>Name: </p>
        <input type="text" name="first_name" placeholder="Customer First Name">
        <input type="text" name="last_name" placeholder="Customer Last Name">
      </div>

      <div class="sin-input-group">
        <p>Order ID:
          <input type="text" name="checkoutID" placeholder="Enter Order Id">
        </p>
        
        <p>Customer ID:
          <input type="text" name="userID" placeholder="Enter Customer ID">
        </p>
      
      <p>Telephone Number:
          <input type="text" name="Tel_no" placeholder="Enter Telephone Number">
        </p>
        
        <p>E-mail:
          <input type="text" name="Email" placeholder="Enter Email address">
        </p>
        
        <p>Address:
          <input type="text" name="address" placeholder="Enter Address">
        </p>
        
        
    </div>
      <button type="submit" name="submit" class="sin-btn">Sign Up</button>
    </form>
  </div>

</body>

</html>