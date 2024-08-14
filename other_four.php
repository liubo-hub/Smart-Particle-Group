<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/child-page-linksbar.css">
    <link rel="stylesheet" href="style/css/admission_rules.css">
    <title>Other_four</title>
    <style>
        .gif-container {
            display: flex;
            justify-content: space-between;
            margin: 20px; /* 调整间距 */
        }

        .gif-container img {
            width: 550px; /* 设置图像宽度 */
            height: auto; /* 保持宽高比 */
        }
        .centered-text {
            text-align: center;
            margin-top: 20px; /* 调整文字与图像的间距 */
            font-size: 18px; /* 调整文字大小 */
        }
        h1 {
            text-align: center;
        }

    </style>
  </head>
  <body>
      <?php require 'header.html'; ?>
      <?php require 'linksbar.html'; ?>
    <div class="wrapper">

      <h1>Chladni Pattern</h1>

    <img src="images/cbliu_images/chladni.png" style="width: 600px; height: 500px; display: block; margin: auto;">

    <form method="post" action="other_four.php">
    <div style="text-align: center;">
        <label for="num1">m(x方向振动频率):</label>
        <input type="number" name="num1" id="num1">
        <label for="num2">n(y方向振动频率):</label>
        <input type="number" name="num2" id="num2">
        ：μm
        <button type="submit" name="submit">提交</button>
    </div>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $num1 = $_POST['num1'];
          $num2 = $_POST['num2'];
          if (isset($_POST['submit'])) {
              $command = "python chladni.py ";
              $command .= escapeshellarg($num1) . " ";
              $command .= escapeshellarg($num2) . " ";
              $output = shell_exec($command);
              echo $output;
          }
        }
    ?>

      <div class="strong-by">
        <strong>GIF</strong>
      </div>

       <div class="gif-container">
            <?php
            $gifPath1 = 'cbliu/animation_36.gif';
            echo "<img src='$gifPath1' alt='GIF 1'>";
            ?>

            <?php
            $gifPath2 = 'cbliu/animation_38.gif';
            echo "<img src='$gifPath2' alt='GIF 2'>";
            ?>
        </div>
            <div class="centered-text">
            <p>左边迭代两个周期，右边迭代三个周期.</p>
        </div>
      <div class="withrawal">
      </div>

    </div>
      <?php require 'footer.html'; ?>
  </body>
</html>
