<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/h&f.css"> <!--header and footer css-->
  <title>EasyPham</title>
</head>

</body>

<?php
    include_once 'header.php';
?>

<!--image slide show-->
<div class="content">
<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="../src/medi 1.png" style="width:100%;">
    </div>

    <div class="mySlides fade">
        <img src="../src/medi 2.png" style="width:100%; ">
    </div>

    <div class="mySlides fade">
        <img src="../src/medi 3.png" style="width: 100%;">
    </div>

</div>
<div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<br>
<br>
<br>
<hr>


<!--Poduct Icon-->
<div class="bestseller">
<h2>BEST SELLER</h2>
<div class="product-container">
  <div class="product-card">
    <img src="../Src/icon 1.png" alt="Product 1">
    <h3 class="product-title">Holistic Way Collagen — Marine Collagen + Complete Antioxidants (60 Veg. Caps)</h3>
    <p class="product-description">Holistic Way Premium Skin Food Collagen is a special formulation which combines the natural goodness of Marine Collagen plus the well-known benefits of antioxidants. This potent combination may help support the maintenance and regeneration of new and healthy skin for a more radiant and beautiful complexion.</p>
    <p class="product-price">Rs:10.99</p>
    <button class="add-to-cart">Add to Cart</button>
  </div>
  <div class="product-card">
    <img src="../Src/icon 2.png" alt="Product 2">
    <h3 class="product-title">Fizovit Tablet | Multivitamin Multiminerals with Co-Enzyme Q10 Tablets Pack </h3>
    <p class="product-description">Fizovit acts as an effective immune booster which ensures a strong immunity.The tablet can be used as a nutritional supplement and aids in the absorption of calcium by the body as well. Can be used in treating all immune deficiency disorders Zinc is very important for boosting up immunity.Vitamin A promotes healthy cell growth.</p>
    <p class="product-price">Rs:19.99</p>
    <button class="add-to-cart">Add to Cart</button>
  </div>
  <div class="product-card">
    <img src="../Src/icon 3.png" alt="Product 3">
    <h3 class="product-title">NATURELO One Daily Multivitamin for Men - Supplement to Boost to Your Energy</h3>
    <p class="product-description">NATURELO Daily Women’s Multi are multivitamin tablets for women that help restore hormonal balance, supports holistic nutrition for women, improve energy levels and helps reduce stress.Featuring premium plant-based vitamins and minerals including as Vitamin D3 from lichen, Vitamin E from sunflower, plant Calcium and Magnesium from marine algae, and Iodine from kelp.</p>
    <p class="product-price">Rs:24.99</p>
    <button class="add-to-cart">Add to Cart</button>
  </div>
  <div class="product-card">
    <img src="../Src/icon 4.png" alt="Product 3">
    <h3 class="product-title">XON-CE Vitamin C 500 mg Chewable Tablets Are a High-quality Dietary Supplement For you</h3>
    <p class="product-description"> Vitamin C 500 mg Chewable Tablets are a high-quality dietary supplement designed to provide your body with a potent dose of Vitamin C. This essential nutrient plays a crucial role in supporting the immune system, promoting skin health, and maintaining overall health and well-being. These chewable tablets are easy to take and come in a delicious orange flavor.</p>
    <p class="product-price">$24.99</p>
    <button class="add-to-cart" >Add to Cart</button>
  </div>
</div>
</div>
<hr>
<br>
<br>
<div class="about-us-container">
  <h2><center>About Us</center></h2>
  <p>EasyPharm Limited a 100% subsidiary of Sunshine Healthcare is one of the 1st branded retail Pharmaceutical Chains in Sri Lanka that has entered the market with a view of creating a difference in the retail pharmaceutical trade. Headed by a team of professionals, EasyPharm has introduced an innovative concept centered on superior customer care, latest technology in data management, a wide product assortment, affordable prices and a host of value additions.</p>
</div>

<script src="../js/script.js"></script> <!--Sctipt File-->

<?php
    include_once 'footer.php';
?>
</body>
</html>