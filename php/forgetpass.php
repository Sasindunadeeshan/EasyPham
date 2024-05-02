<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "../css/h&f.css" > <!--header css-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/forgetpass.css">
    <title>Forget Password</title>

</head>
<?php
     include "header.php";
?>
<body>
  <div class="container">
    <h2>Forgot Password</h2>
    <form action="reset_password.php" method="POST">
      <label for="newpassword">New Password:</label>
      <input type="password" id="newpassword" name="password" required>
      <label for="ConfirmPassword">Confirm Password</label>
      <input type="Password" id="ConfirmPassword" name="NewPassword" required>

      <input type="submit" value="Reset Password">
    </form>
  </div>
</body>
<?php
     include "footer.php";
    ?>
    </body>
</html>