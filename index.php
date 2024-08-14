<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/main-page-linksbar.css">
    <link rel="stylesheet" href="style/css/header.css">
    <script src="js/Jquery.js"></script>
    <title>Smart Particle Group</title>
  </head>
  <body>
    <?php require 'linksbar.html'; ?>
    <div class="school">
        <div class="top-school">
        <div class="top-school-text">
          <h1>Smart Particle Group</h1>
          <p>Smart Particle Group</p>
        </div>
      </div>
    </div>

    <section>
    </section>
    <div id="slide-container">
      <div class="slide-btn slide-btn-next">
      </div>
      <div class="slide-btn slide-btn-prev">
      </div>
      <div class="slide" id="slide3"></div>
      <div class="slide" id="slide2"></div>
      <div class="slide" id="slide1" ></div>
    </div>
    <div class="para1" >
      <h4>Welcome to Smart Particle Group</h4><hr>
    </div>
    <h2>LATEST NEWS</h2>

    <p3>2023.7.21在化学工程学院，陈教授邀请英国皇家学会院士进行学术交流</p3>
    <section>
      <div class="photo-container">
        <div class="photo-item">
          <img src="\images\index\4.jpg" alt="Photo 1">
          <p>陈教授做欢迎致辞</p>
        </div>
        <div class="photo-item">
          <img src="\images\index\5.jpg" alt="Photo 2">
          <p>英国皇家学会院士做报告</p>
        </div>
      </div>
    </section>

    <h2>竞赛</h2>
    <section>
      <div class="photo-container">
        <div class="photo-item">
          <img src="\images\index\6.jpg" alt="Photo 1">
          <p>"AI For Science"三等奖</p>
        </div>
        <div class="photo-item">
          <img src="\images\index\7.jpg" alt="Photo 2">
          <p>"Hackathon"技术创新奖</p>
        </div>
      </div>


    <div class="wrapper">
      <div class="strong-by">
        <strong>GIF</strong>
      </div>
      <?php
        $gifPath = 'images\Goop-20.gif';
        // 设置图像的宽度和高度
        $imageWidth = 1000;
        $imageHeight = 1000;

        // 输出HTML的<img>标签来展示GIF图像，并添加样式属性
        echo "<img src='$gifPath' alt='GIF' style='width: {$imageWidth}px; height: $imageHeight; display: block; margin: 0 auto;'>";?>
      <div class="strong-by">
        <strong>End</strong>
      </div>
    </div>

    <?php require 'footer.html'; ?>
    <script src="js/slider.js"></script>
  </body>
</html>
