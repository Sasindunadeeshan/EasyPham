<div class="up-header">
    <p class="numb">0777777777</p>
    <div class="socialIcon">
        <i class="fa fa-pinterest-square" style="font-size:24px"></i>
        <i class="fa fa-facebook-square" style="font-size:24px"></i>
        <i class="fa fa-linkedin-square" style="font-size:24px"></i>
    </div>

    <?php
    if (isset($_SESSION['userEmail'])) {
        // User is logged in, display the upload prescription button
        echo '<button class="upload"><a href="uploadprs.php">Upload Prescription</a></button>';
    } else {
        // User is not logged in, display the login button with a redirect to uploadprs.php
        echo '<button class="upload"><a href="login.php?redirect=uploadprs.php">Upload Prescription</a></button>';
    }
    ?>
</div>

<header>
    <div class="logo">
        <a href="index.php">
            <img src="../src/logo.png" alt="logo"> 
        </a>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">| Home |</a></li>
            <li><a href="aboutus.php">| About |</a></li>
            <li class="dropdown">
                <a href="product.php" class="dropdown-toggle">| Product <i class="fa fa-angle-down"> |</a></i>
                <div class="dropdown-menu">
                    <ul id="product">
                        <li><a href="#">Multi-Vitamins</a></li>
                        <li><a href="#">Supplements</a></li>
                        <li><a href="#">Nutrition</a></li>
                    </ul>
                </div>
            </li>   
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">| Beauty <i class="fa fa-angle-down"> |</a></i></i>
                <div class="dropdown-menu">
                    <ul id="beauty">
                        <li><a href="#">Face Care</a></li>
                        <li><a href="#">Body Care</a></li>
                        <li><a href="#">Hair Care</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <div class="search-container">
        <form action="#">
            <input type="text" placeholder="Search.." name="search" class="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <span class="cart">
        <a href="cart.php">
            <i class="fa fa-shopping-cart" style="font-size:36px"></i>
        </a>
    </span>
    <?php
    if (isset($_SESSION['userEmail'])) {
        // User is logged in, display user icon and logout button
        echo '<a href="customer.php"><i class="fa fa-user-circle" style="font-size:36px; color:#fff"></i></a>';
        echo '<a href="../include/logout.inc.php" class="login">Log out</a>';
    } else {
        // User is not logged in, display login button
        echo '<a href="login.php" class="login">Login</a>';
    }
    ?>
</header>
