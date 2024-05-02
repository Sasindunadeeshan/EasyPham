<html lang="en">
<head>
    <link rel="stylesheet" href="../css/adminheader.css">
    <link rel="stylesheet" href="../css/inven.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    include_once "adminheader.php";

    require "../include/dbh.inc.php";


    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    ?>

    <table>
        <thead>
          <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Iterate over the result set and display rows dynamically
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['productID'] . "</td>";
              echo "<td>" . $row['pName'] . "</td>";
              echo "<td>" . $row['pDescription'] . "</td>";
              echo "<td>" . $row['pImage'] . "</td>";
              echo "<td>" . $row['pPrice'] . "</td>";
              echo "<td>";
              echo "<button>Delete</button>";
              echo "</td>";
              echo "</tr>";
          }
          ?>
        </tbody>
      </table>

</body>
</html>