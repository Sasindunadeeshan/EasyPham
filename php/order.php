<html lang="en">
<head>
  <link rel="stylesheet" href="../css/adminheader.css">
  <link rel="stylesheet" href="../css/order.css">
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

    // Function to delete a row from the orderitem table
    function deleteOrderItem($orderID) {
      global $conn;
      $sql = "DELETE FROM orderitem WHERE checkoutID = '$orderID'";
      mysqli_query($conn, $sql);
    }

    // Retrieve order data with customer name and product name from the database
    $sql = "SELECT oi.checkoutID, cd.full_Name, p.pName, oi.quantity, oi.totalAmount
            FROM orderitem oi
            INNER JOIN checkoutdetails cd ON oi.checkoutID = cd.checkoutID
            INNER JOIN product p ON oi.productID = p.productID";
    $result = mysqli_query($conn, $sql);

    
    if (isset($_POST['delete'])) {
      $orderID = $_POST['orderID'];
      deleteOrderItem($orderID);
    }
  ?>

  <table>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['checkoutID']; ?></td>
          <td><?php echo $row['full_Name']; ?></td>
          <td><?php echo $row['pName']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo $row['totalAmount']; ?></td>
          <td>shipped</td>
          <td>
            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
              <input type="hidden" name="orderID" value="<?php echo $row['checkoutID']; ?>">
              <button type="submit" name="delete">Delete</button>
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
