<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/child-page-linksbar.css">
    <link rel="stylesheet" href="style/css/admission_rules.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Other_two</title>
  </head>
  <body>
      <?php require 'header.html'; ?>
      <?php require 'linksbar.html'; ?>
    <div class="wrapper">
      <h2>林齐乐师姐</h2><hr>
      <div class="wrapper">
      <div class="welcome">
        <strong style="font-size: 20px;">Dear user, This is Linqile's project.</strong>
        <p style="font-size: 20px;">Enter a value less than two hundred, you can plot the modal value at this time</p>

        <div class="container_other_two">
          <div class="box">
            <div class="video-container_other_two">
              <iframe src="//player.bilibili.com/player.html?bvid=BV1w14y1R7Gr&page=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"
              sandbox="allow-same-origin allow-scripts allow-presentation allow-top-navigation"> </iframe>
            </div>
          </div>
          
          <div class="box">
            <img src="linqileImages\plot.png" style="width: 600px; height: 500px;">
            <form method="post" action="other_two.php">
              <div class="gridliu">
                <label for="num1">x10:</label>
                <input type="number" name="num1" id="num1">
                <label for="num2">x50:</label>
                <input type="number" name="num2" id="num2">
                
                <label for="num3">x90:</label>
                <input type="number" name="num3" id="num3">
                
                <label for="num4">a10:</label>
                <input type="number" name="num4" id="num4">
                
                <label for="num5">a50:</label>
                <input type="number" name="num5" id="num5">
                
                <label for="num6">a90:</label>
                <input type="number" name="num6" id="num6">
                
                <label for="num7">s10:</label>
                <input type="number" name="num7" id="num7">
                
                <label for="num8">s50:</label>
                <input type="number" name="num8" id="num8">
          
                <label for="num9">s90:</label>
                <input type="number" name="num9" id="num9">
                ：μm
                <button type="submit" name="submit">提交</button>
              </div>
            </form>

              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $num1 = $_POST['num1'];
                  $num2 = $_POST['num2'];
                  $num3 = $_POST['num3'];
                  $num4 = $_POST['num4'];
                  $num5 = $_POST['num5'];
                  $num6 = $_POST['num6'];
                  $num7 = $_POST['num7'];
                  $num8 = $_POST['num8'];
                  $num9 = $_POST['num9'];
                  if (isset($_POST['submit'])) {
                      $command = "python linqile.py ";
                      $command .= escapeshellarg($num1) . " ";
                      $command .= escapeshellarg($num2) . " ";
                      $command .= escapeshellarg($num3) . " ";
                      $command .= escapeshellarg($num4) . " ";
                      $command .= escapeshellarg($num5) . " ";
                      $command .= escapeshellarg($num6) . " ";
                      $command .= escapeshellarg($num7) . " ";
                      $command .= escapeshellarg($num8) . " ";
                      $command .= escapeshellarg($num9);
                      $output = shell_exec($command);
                      echo $output;
                  }
                }
              ?>
          </div>
        </div>
        
        <strong style="font-size: 20px;">“Rendering modal”</strong>
        <p style="font-size: 20px;"><span> Note :</span> The left side is the mode value at time 1, and the right side is the mode you want to plot at a certain time
        </p>
        <strong class="regard">详情请联系林师姐</strong>
      </div>
    </div>
    </div>
      <?php require 'footer.html'; ?>
  </body>
</html>
