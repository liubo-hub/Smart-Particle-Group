<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/child-page-linksbar.css">
    <link rel="stylesheet" href="style/css/admission.css">
    <title>Welcome to Group</title>
  </head>
  <body>
      <?php require 'header.html'; ?>
      <?php require 'linksbar.html'; ?>
    <div class="wrapper">
      <h2>蒋宇师兄</h2><hr>
      <div class="welcome">
        <strong style="font-size: 20px;">Dear user, this is a project of Brother Jiang Yu.</strong>
        <p style="font-size: 20px;">Enter a value less than two hundred, you can plot the modal value at this time</p>
        <div class="container_other">
          <div class="box">
          <img src="jiangyuImages/initial.png" style="width: 540px; height:450px;">
          </div>
          
          <div class="box">
          <form method="POST">
          <label for="number">请输入数值:</label>
          <input type="number" id="number" name="number">
          <button type="submit" name="submit">提交</button>
          </form>

          <?php
          if (isset($_POST['submit'])) {
              $number = $_POST['number'];
              $command = sprintf("python jiangyu_project.py %d", $number);
              
            
              $output = shell_exec($command);
              $output = trim($output);
            
          }
          ?>
          <img src="jiangyuImages\plot.png" style="width: 540px; height: 400px;">
            
          </div>
        </div>
        
       
        <strong style="font-size: 20px;">“Rendering modal”</strong>
        <p style="font-size: 20px;"><span> Note :</span> The left side is the mode value at time 1, and the right side is the mode you want to plot at a certain time
        </p>
        <strong class="regard">详情请联系蒋师兄</strong>
      </div>
    </div>
      <?php require 'footer.html'; ?>
  </body>
</html>
