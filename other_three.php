<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/child-page-linksbar.css">
    <link rel="stylesheet" href="style/css/admission_rules.css">
    <title>Other_three</title>
  </head>
  <body>
      <?php require 'header.html'; ?>
      <?php require 'linksbar.html'; ?>
    <div class="wrapper">
      <h2>Other Three</h2><hr>
      <?php
        $videoPath = 'mv\DPI.mp4'; 
      ?>

        <video controls>
          <source src="<?php echo $videoPath; ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      <div class="withrawal">
      </div>

    </div>
      <?php require 'footer.html'; ?>
  </body>
</html>
