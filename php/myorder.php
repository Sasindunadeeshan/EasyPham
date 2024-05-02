<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
    <link rel="stylesheet" href="../css/myorder.css">
    <link rel="stylesheet" href="../css/h&f.css"> <!--header and footer css-->
    <title>Order History</title>
</head>
<body>
    <?php
    include_once 'header.php';
    ?>

    <div class="myorder">
        <h1>Order History</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th id="opt">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve order history from the database
                require_once "../include/dbh.inc.php";
                $sql = "SELECT oi.checkoutID,oi.productID,p.pName, oi.quantity, oi.totalAmount
                        FROM orderitem oi
                        INNER JOIN product p ON oi.productID = p.productID";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $orderID = $row['checkoutID'];
                    $productID = $row['productID'];
                    $productName = $row['pName'];
                    $quantity = $row['quantity'];
                    $price = $row['totalAmount'];

                    echo "<tr>";
                    echo "<td>#{$orderID}</td>";
                    echo "<td>{$productID}</td>";
                    echo "<td>{$productName}</td>";
                    echo "<td>{$quantity}</td>";
                    echo "<td>{$price}</td>";
                    echo "<td>";
                    echo "<div class='options'>";
                    echo "<a href='feedback.php'><button class='rate-button'><i class='fa fa-star'></i> Rate</button></a>";
                    echo "<form method='POST' action='../include/myorder.inc.php' onsubmit='return confirm(\"Are you sure you want to cancel this order?\")'>";
                    echo "<input type='hidden' name='orderID' value='{$orderID}'>";
                    echo "<button type='submit' name='cancel-button' class='cancel-button'><i class='fa fa-times'></i> Cancel</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    include_once 'footer.php';
    ?>

</body>
</html>
