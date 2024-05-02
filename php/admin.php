<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/adminheader.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "adminheader.php";
    require_once "../include/dbh.inc.php";

    // Retrieve total customer count from users table
    $sql = "SELECT COUNT(*) AS total_customers FROM users";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalCustomers = $row['total_customers'];
     

    $sql = "SELECT COUNT(*) AS Total_product FROM product";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $Total_product = $row['Total_product'];

    $sql = "SELECT COUNT(*) AS Total_FeedBack FROM feedback";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalfeedback = $row['Total_FeedBack'];

    $sql = "SELECT COUNT(*) AS Total_order FROM orderitem";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalorder = $row['Total_order'];


    ?>

    <section>
        <div class="container">
            <div class="boxes">
                <div class="box box1">
                    <i class="fa fa-users" style="font-size:48px"></i><br>
                    <span class="text"><h3>Total Customers</h3></span><br>
                    <span class="value"><?php echo $totalCustomers; ?></span>
                </div>

                <div class="box box2">
                    <i class="fa fa-capsules" style="font-size:48px"></i><br>
                    <span class="text"><h3>Total Product</h3></span><br>
                    <span class="value"><?php echo $Total_product; ?></span>
                </div>

                <div class="box box3">
                    <span class="text"><h3>Total Orders</h3></span>
                    <span class="value"><?php echo $totalorder; ?></span>
                </div>

                <div class="box box4">
                    <span class="text"><h3>Total Feedback</h3></span>
                    <span class="value"><?php echo $totalfeedback; ?></span>
                </div>
            </div>
        </div>
    </section>
</body>
</html>