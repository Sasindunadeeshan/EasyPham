<html lang="en">
<head>
    <link rel="stylesheet" href="../css/adminheader.css">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "adminheader.php";
    include_once "../include/dbh.inc.php";

  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        if (isset($_POST['delete'])) {
            $userID = $_POST['userID'];

           
            $deleteSql = "DELETE FROM users WHERE userID = '$userID'";
            mysqli_query($conn, $deleteSql);

            
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }

    // Retrieve customer data from the database
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    ?>

    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Telephone number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['userID']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phoneNum']; ?></td>
                    <td>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                            <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this user?')">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
