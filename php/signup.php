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
  <link rel="stylesheet" href="../css/signup.css">
  <title>Sign in</title>

</head>

<?php include "header.php"; ?>

<body>
  <div class="sin-signinbox">

    <h1>Create New Account</h1>
    <form action="../include/signup.inc.php" method="post">
      <div class="sin-input-group">
        <p>Name: </p>
        <input type="text" name="fName" placeholder="First Name">
        <input type="text" name="lName" placeholder="Last Name">
      </div>
      <div class="sin-input-group sin-gender">
        <p>Gender:</p>
        <label>
          <input type="radio" name="gender" value="male">
          Male
        </label>
        <label>
          <input type="radio" name="gender" value="female">
          Female
        </label>
      </div>

      <div class="sin-input-group">
        <p>Email:
          <input type="text" name="email" placeholder="Enter an Email">
        </p>
        <p>Password:
          <input type="Password" name="pwd" placeholder="Enter Password">
        </p>
        <p>Confirm Password:
          <input type="Password" name="pwdrepeat" placeholder="Confirm Password">
        </p>
        <p>Phone Number:
          <input type="text" name="pNumber" placeholder="Enter Phone Number">
        </p>
        <p>Address:
          <input type="text" name="address" placeholder="Enter Address">
        </p>
        <p>City:
          <input type="text" name="city" placeholder="Enter City">
        </p>
        <p>Province:
          <input type="text" name="uid" placeholder="Enter Province">
        </p>
        <p>Postal Code:
          <input type="text" name="Postalcode" placeholder="Enter Postal Code">
        </p>
      </div>
      <button type="submit" name="submit" class="sin-btn">Sign Up</button>
    </form>
  </div>

</body>

</html>
