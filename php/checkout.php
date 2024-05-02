<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/checkout.css">
    <link rel="stylesheet" href="../css/h&f.css"> <!--header css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Checkout</title>
</head>

<body>
    <?php
    include_once 'Header.php';
    require_once "../include/dbh.inc.php";

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve the form data
                $fullName = $_POST['firstname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $mobile = $_POST['mobile'];
                $province = $_POST['Province'];
                $zip = $_POST['zip'];
                $paymentMethod = isset($_POST['paymentmtd']) ? $_POST['paymentmtd'] : ''; // Check if payment method is set
                $cardName = $_POST['cardname'];
                $cardNumber = $_POST['cardnumber'];
                $expMonth = $_POST['expmonth'];
                $expYear = $_POST['expyear'];
                $cvv = $_POST['cvv'];


                    foreach ($_SESSION['shopping_cart'] as $item) {
                        $itemId = $item['product_id']; // Assign the product ID to the $itemId variable
                        $itemQuantity = $item['quantity']; // Assign the quantity to the $itemQuantity variable
                        $itemTotalPrice = floatval($item['item_price']) * intval($item['quantity']); // Calculate the total amount

                        // Insert data into the checkoutdetails table
                        $stmt = $conn->prepare("INSERT INTO checkoutdetails(full_name, email, cAddress, mobile, province, zip, payment_method, card_name, card_number, exp_month, exp_year, cvv) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                        $stmt->bind_param("ssssssssssss",$fullName, $email, $address, $mobile, $province, $zip, $paymentMethod, $cardName, $cardNumber, $expMonth, $expYear, $cvv);
                        $stmt->execute();

                        // Retrieve the generated checkoutID
                        $checkoutID = $stmt->insert_id;

                        // Insert order quantity, total amount, and checkoutID into the orderitem table
                        $stmt = $conn->prepare("INSERT INTO orderitem(productID, quantity, totalAmount, checkoutID) VALUES (?,?,?,?)");
                        $stmt->bind_param("iidi", $itemId, $itemQuantity, $itemTotalPrice, $checkoutID);
                        $stmt->execute();
                    }


                // Clear the shopping cart after successful checkout
                unset($_SESSION['shopping_cart']);

                // Redirect to a thank you page or any other appropriate page
                header("Location: thankyou.php");
                exit();
            }

            // Get the quantity of items in the shopping cart
            $cartQuantity = isset($_SESSION["shopping_cart"]) ? count($_SESSION["shopping_cart"]) : 0;
        ?>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <br>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input class="coutinput" type="text" id="fname" name="firstname" placeholder="Sasindu Nadeeshan">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input class="coutinput" type="text" id="email" name="email" placeholder="Sasindu@gmail.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input class="coutinput" type="text" id="adr" name="address" placeholder="222/4, Kaduwela RD. Malabe">
                            <label for="city"><i class="fa fa-mobile-phone" style="font-size:30px"></i> Mobile-Number</label>
                            <input class="coutinput" type="text" id="mobile" name="mobile" placeholder="077-xxxxxxx">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">Province</label>
                                    <input class="coutinput" type="text" id="Province" name="Province" placeholder="Western Province">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input class="coutinput" type="text" id="zip" name="zip" placeholder="80400">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <br>
                            <div class="paymentmethod"> 
                                <label>
                                    <input type="radio" name="paymentmtd" value="accepted"> Accepted Cards <!-- Add value attribute -->
                                </label>
                                <label class="cod">
                                    <input type="radio" name="paymentmtd" value="cash"> Cash On Delivery <!-- Add value attribute -->
                                </label>
                            </div>
                            <div class="paymentIcon">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input class="coutinput" type="text" id="cname" name="cardname" placeholder="S Nadeeshan">
                            <label for="ccnum">Credit card number</label>
                            <input class="coutinput" type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input class="coutinput" type="text" id="expmonth" name="expmonth" placeholder="September">

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input class="coutinput" type="text" id="expyear" name="expyear" placeholder="2024">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input class="coutinput" type="text" id="cvv" name="cvv" placeholder="425">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="down">
                        <hr>
                        <br>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <input type="hidden" name="totalQuantity" value="<?php echo $totalQuantity; ?>"> <!-- Add hidden input field for totalQuantity -->
                        <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>"> <!-- Add hidden input field for totalPrice -->
                        <input type="submit" value="Continue to checkout" class="checkoutBtn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>

</body>
</html>
