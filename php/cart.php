<?php
session_start();

require_once "../include/dbh.inc.php";
include_once "../include/productCart.inc.php";

// update the quantity of a product in the shopping cart
function updateQuantity($productID, $quantity) {
    if (isset($_SESSION["shopping_cart"]) && !empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($value["product_id"] == $productID) {
                $_SESSION["shopping_cart"][$key]["quantity"] = $quantity;
                break;
            }
        }
    }
}

// remove an item from the shopping cart
function removeItem($productID) {
    if (isset($_SESSION["shopping_cart"]) && !empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($value["product_id"] == $productID) {
                unset($_SESSION["shopping_cart"][$key]);
                break;
            }
        }
        $_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]); // Reset array keys
    }
}

// Check if the product ID and quantity are provided in the request
if (isset($_POST["productID"]) && isset($_POST["quantity"])) {
    $productID = $_POST["productID"];
    $quantity = $_POST["quantity"];
    updateQuantity($productID, $quantity);
    $total = 0;
    foreach ($_SESSION["shopping_cart"] as $key => $value) {
        $itemTotal = $value["item_price"] * (isset($value["quantity"]) ? $value["quantity"] : 1); // Calculate the total for the item
        $total += $itemTotal; 
    }
    echo number_format($total, 2);
    exit; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/h&f.css"> <!--header css-->
    <title>Shopping Cart</title>
</head>

<body>
    <?php include 'cartHeader.php'; ?>

    <div class="CartContainer">
        <div class="cartHeader">
            <h3 class="Heading">Shopping Cart</h3>
        </div>

        <?php
        $total = 0; 
        if (isset($_SESSION["shopping_cart"]) && !empty($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
                $itemTotal = $value["item_price"] * (isset($value["quantity"]) ? $value["quantity"] : 1); // Calculate the total for the item
                $total += $itemTotal; // Add the item total to the overall total
                ?>

                <div class="Cart-Items">
                    <div class="image-box">
                        <img src="<?php echo $value["item_image"]; ?>" alt="product img" style="height: 120px;">
                    </div>
                    <div class="about">
                        <h1 class="title"><?php echo $value["item_name"]; ?></h1>
                    </div>
                    <div class="counter">
                        <input type="number" min="1" name="quantity" value="<?php echo isset($value["quantity"]) ? $value["quantity"] : 1; ?>"
                               onchange="updateQuantity(<?php echo $value["product_id"]; ?>, this.value)">
                    </div>
                    <div class="prices">
                        <div class="price"><?php echo $value["item_price"]; ?></div>
                        <div class="save"><u>Save for later</u></div>
                        <div class="remove">
                            <button><a href="cart.php?action=delete&productID=<?php echo $value["product_id"]; ?>">Remove</a></button>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>

        <hr>
        <br>
        <div class="checkout">
            <div class="total">
                <div>
                    <div class="Subtotal">Sub-Total</div>
                    <div class="items"><?php echo isset($_SESSION["shopping_cart"]) ? count($_SESSION["shopping_cart"]) : 0; ?> items</div>
                </div>
                <div id="total-amount" class="total-amount">$<?php echo number_format($total, 2); ?></div>
            </div>
            <span>
                <a href="checkout.php" class="cout">Checkout</a>
            </span>
        </div>
    </div>

    <script> 
        // update the quantity and total amount in real-time
        function updateQuantity(productID, quantity) {
            // Create a new AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "cart.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the total amount on the page
                    var totalAmount = document.getElementById("total-amount");
                    totalAmount.innerHTML = "$" + xhr.responseText;
                }
            };
            xhr.send("productID=" + productID + "&quantity=" + quantity);
        }
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
