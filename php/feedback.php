<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
    <link rel="stylesheet" href="../css/feedback.css">
    <link rel="stylesheet" href="../css/h&f.css"> <!--header and footer css-->
    <title>Order Feedback</title>
</head>
<body>
    <?php
    include_once 'header.php';
    ?>

<body>
  <h1>Order Feedback</h1>
  <form class="feedback" method="POST" action="../include/feedback.inc.php">
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="text" id="email" name="email" class="input-text-custom">
        </div>
        <div class="form-group">
            <label for="order-id">Order ID:</label>
            <input type="text" id="order-id" name="orderID" class="input-text-custom">
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" class="select-custom">
                <option value="">Select Rating</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
        </div>
        <div class="form-group">
            <label>Feedback:</label>
            <textarea name="feedback" class="textarea-custom"></textarea>
        </div>
        <div class="form-group">
            <label>Would you recommend us?</label>
            <input type="radio" name="recommend" value="yes" class="input-radio-custom"> Yes
            <input type="radio" name="recommend" value="no" class="input-radio-custom"> No
        </div>
        <button type="submit" name="submit-feedback" class="button-submit-custom">Submit Feedback</button>
  </form>

  <?php
include_once 'footer.php';
?>

</body>

</html>
