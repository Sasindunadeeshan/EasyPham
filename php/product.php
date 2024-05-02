<?php
require_once "../include/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/h&f.css">
    <title>Product</title>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <div class="sidebar">
        <a class="active" href="#">Mother & Baby</a>
        <a href="#">Men's</a>
        <a href="#">Personal Care</a>
        <a href="#">Cosmetics & Fragrances</a>
    </div>

    <div class="content">
        <div class="allproduct">
            <div class="myproduct-container">
                <?php
                $query = "SELECT * FROM product ORDER BY productID ASC";
                $result = mysqli_query($conn, $query);
                $productsPerColumn = 3;
                $counter = 0;

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="myproduct-row">';
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="myproduct-column">';
                ?>
                        <div class="myproduct-card">
                            <img src="<?php echo $row["pImage"]; ?>" alt="Product 1">
                            <p class="myproduct-description"><?php echo $row["pDescription"]; ?></p>
                            <h3 class="myproduct-title"><?php echo $row["pName"] ?></h3>
                            <p class="myproduct-price"><?php echo $row["pPrice"]; ?></p>
                            <form method="post" action="cart.php?action=add&productID=<?php echo $row["productID"]; ?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pName"] ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["pPrice"] ?>">
                                <input type="hidden" name="hidden_image" value="<?php echo $row["pImage"] ?>">
                                <button type="submit" class="myadd-to-cart" name="addcart">Add to Cart</button>
                            </form>
                        </div>
                <?php
                        echo '</div>';
                        $counter++;
                        if ($counter % $productsPerColumn === 0 && $counter !== mysqli_num_rows($result)) {
                            echo '</div><div class="myproduct-row">';
                        }
                    }
                    echo '</div>';
                } else {
                    echo "No products found.";
                }
                ?>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
