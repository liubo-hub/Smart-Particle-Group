<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/child-page-linksbar.css">
    <link rel="stylesheet" href="style/css/gallery.css">
    <script src="js/Jquery.js" charset="utf-8"></script>
    <title>contact</title>
</head>

<body>
      <?php require 'header.html'; ?>
      <?php require 'linksbar.html'; ?>
    <div class="container">
      <div class="container-head">
        <h2>contact</h2>
        <select name="last-class-attended">
          <option value="">Independece</option>
          <option value="">Republic</option>
        
        </select>
      </div>

        <img id="myImg" src="images/contact/11.jpg" alt="Northern Lights, Norway" width="900px" >
        <div class="img-view">
          <div class="img-display">
              <img src="images/contact/11.jpg" class="img-block" alt="">
              <img src="images/contact/12.jpg" class="img-block" alt="">
              <img src="images/contact/13.jpg" class="img-block" alt="">
              <img src="images/contact/14.jpg" class="img-block" alt="">
              <img src="images/contact/15.jpg" class="img-block" alt="">
              <img src="images/contact/16.jpg" class="img-block" alt="">
              <img src="images/contact/17.jpg" class="img-block" alt="">
              <img src="images/contact/18.jpg" class="img-block" alt="">
          </div>
           <li>详细地址：</li>
           <li>上海市闵行区上海交通大学</li>
        </div>
    </div>
     <ul>
          
    </ul>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">×</span>
        <img class="modal-content" id="img01" src="">

    </div>

    <script>
    $(document).ready(function(){
      $(".img-block").click(function(){
        var srcimg = $(this).attr("src");
        $("#myImg").attr("src",function(){
          return srcimg;
        });
      });
      $("#myImg").click(function(){
        var srcimg = $(this).attr("src");
        $("#img01").attr("src",function() {
          return srcimg ;
        });
        $("#myModal").css("display", "flex");
      });
      $(".close").click(function(){
        $("#myModal").css("display", "none");
      });
    });
    </script>
  <?php require 'footer.html'; ?>
</body>

</html>
