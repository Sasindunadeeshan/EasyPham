<html lang="en">
<head>
    <link rel="stylesheet" href="../css/adminheader.css">
    <link rel="stylesheet" href="../css/employee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <?php
        include_once "adminheader.php";
        //database connection
        require_once '../include/dbh.inc.php';

        //Handle form submission
        if (isset($_POST["submit"])) {
            
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $password = $_POST["Password"];
            $address = $_POST["address"];
            $phoneNum = $_POST["phoneNum"];
            $position = $_POST["role"];
            $email = $_POST["email"];

           

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert into the database
            $sql = "INSERT INTO users (firstName, lastName, password, address, phoneNum, role, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                exit();
            }

            mysqli_stmt_bind_param($stmt, "sssssss", $firstName, $lastName, $hashedPassword, $address, $phoneNum, $position, $email);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

            echo '<script>alert("Successfully registered!");</script>';


             
        }
        ?>



<div class="reg-form">
        <h1>Add Employee </h1>

        <form action="employee.php" method="post">

            <p>Employee First Name :</p>
            <input type="text" name="firstName" > 

            <p>Employee Last Name :</p>
            <input type="text" name="lastName" >

            <p>Employee Password :</p>
            <input type="text" name="Password" >  
            <p>Employee Address :</p>
            <input type="text" name="address" >  

            <p>Telephone Number :</p>
            <input type="text" name="phoneNum" >

            <p>Position :</p>
            <input type="text" name="role" >

            <p>E-mail :</p>
            <input type="text" name="email"><br>

            <button type="submit" name="submit">Register </button>


        </form>
    </div>

</body>
</html>