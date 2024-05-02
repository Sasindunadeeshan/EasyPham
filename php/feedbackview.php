<html lang="en">
<head>
    <link rel="stylesheet" href="../css/adminheader.css">
    <link rel="stylesheet" href="../css/feedbackview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include_once "adminheader.php";
require_once '../include/dbh.inc.php';

// Retrieve feedback from the database
$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);

?>

<h1> <center>Feedback</center>  </h1>

<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Order ID</th>
            <th>Rating</th>
            <th>feedback</th>
            <th>Recommendation</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $orderID = $row['orderID'];
            $rating = $row['rating'];
            $feedback = $row['FeedBack'];
            $recommendation = $row['recommendation'];
        ?>
            <tr>
                <td><?php echo $email; ?></td>
                <td><?php echo $orderID; ?></td>
                <td><?php echo $rating; ?></td>
                <td><?php echo $feedback; ?></td>
                <td><?php echo $recommendation; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>