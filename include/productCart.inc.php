<?php

if (isset($_POST["addcart"])) {
    if (!isset($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = array();
    }

    $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
    if (!in_array($_GET["productID"], $item_array_id)) {
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array(
            'product_id' => $_GET["productID"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_image' => $_POST["hidden_image"],
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
    }
    header("Location: ../php/product.php");
}

if (isset($_GET["action"])) {
    if ($_GET["action"] === "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["product_id"] === $_GET["productID"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                break;
            }
        }
        header("Location: ../php/cart.php");
    }
}
?>
