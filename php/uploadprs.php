<?php
include_once 'header.php';

if (isset($_POST["submit"])) {

  $file = $_FILES["prs-prescription"];

  $fileName = $file["name"];
  $tempLocation = $file["tmp_name"];

  $targetDir = "../src/upload/" . $fileName;

  move_uploaded_file($tempLocation, $targetDir);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--icon-->
    <link rel="stylesheet" href="../css/uploadprs.css">
    <link rel="stylesheet" href="../css/h&f.css"> <!--header and footer css-->
    <title>Upload Prescription</title>
</head>
<body>
  <h1>Upload Your Prescription</h1>
  <form class="prs-feedback" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="prs-form-group">
      <label for="prs-name">Your Name:</label>
      <input type="text" id="prs-name" name="prs-name" class="prs-input-text">
    </div>
    <div class="prs-form-group">
      <label for="prs-mobile-number">Mobile Number:</label>
      <input type="text" id="prs-mobile-number" name="prs-mobile-number" class="prs-input-text">
    </div>
    <div class="prs-form-group">
      <label for="prs-prescription">Prescription:</label>
      <input type="file" id="prs-prescription" name="prs-prescription" class="prs-input-file">
      <span class="prs-file-format">Accepted file formats: JPG, PNG, PDF</span>
    </div>
    <div class="prs-form-group">
      <label>Additional Notes:</label>
      <textarea name="prs-notes" class="prs-input-textarea"></textarea>
    </div>
    <button type="submit" name="submit" class="prs-submit-button">Submit Prescription</button>
  </form>

  <?php
    include_once 'footer.php';
  ?>

</body>

</html>
