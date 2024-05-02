<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/h&f.css"> <!--header css-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<?php
include "header.php";
?>

<body class="body2">

<?php
    // Check if there is an error message in the URL
    if (isset($_GET['error']) && $_GET['error'] === 'wrongLogin') {
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
    }
    ?>
    <div class="loginbox">
        <h1>Login</h1>
        <form action="../include/login.inc.php" method="post">
            <div class="input-group">
                <p>Username</p>
                <input type="text" name="uid" placeholder="Enter Username">
            </div>
            <div class="input-group">
                <p>Password</p>
                <input type="password" name="pwd" placeholder="Enter Password">
            </div>
            <br>
            <div class="checkbox-section">
                <input type="checkbox">Remember me
            </div>
            <center>
                <div class="button-section">
                    <button type="submit" name="submit">Login</button>
                </div>
            </center>
            <br>
            <br>
            <div class="three-section">
                <a href="signup.php">Don't have an account?</a>
                <span class="two-section"><a href="forgetpass.php">Forget password?</a><br></span>
            </div>
        </form>
    </div>
    <footer class="foot">
        <?php
        include "footer.php";
        ?>
    </footer>
</body>
</html>
