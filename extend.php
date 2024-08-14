<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/child-page-linksbar.css">
    <link rel="stylesheet" href="style/css/regulation.css">
    <style>
    label {
      font-size: 20px;
    }
    
    input[type="file"] {
      font-size: 20px;
    }
    
    button {
      font-size: 20px;
    }
    .success {
      font-size: 20px;
    }
    
    .error {
      font-size: 20px;
      font-weight: bold;
      color: red;
    }
</style>
    <title>文件上传</title>
  </head>
  <body>
    
    <?php require 'header.html'; ?>
    <?php require 'linksbar.html'; ?>
    <div class="wrapper">
      <div class="regulation">
      <h2>文件上传</h2>
    
      <?php
      // 检查是否有上传的文件
      if(isset($_FILES['file'])) {
        $file = $_FILES['file'];
        
        // 获取文件信息
        $fileName = $file['name'];
        $fileTmpPath = $file['tmp_name'];
        $fileSize = $file['size'];
        
        // 示例：移动文件到 uploads 目录
        $destination = 'uploads/' . $fileName;
        if(move_uploaded_file($fileTmpPath, $destination)) {
          echo "<p class='success'>文件上传成功</p>";
        } else {
          echo "<p class='error'>文件上传失败</p>";
        }
      }
      ?>
      <form method="POST" enctype="multipart/form-data">
        <div>
          <label for="file">选择文件:</label>
          <input type="file" id="file" name="file">
        </div>
        <button type="submit" name="submit">上传</button>
      </form>
        <ul>
          <li>This is the file upload function</li>
          <li>......</li>
          <li>......</li>
          <li>......</li>
          <li>......</li>
          <li>......</li>
          <li>......</li>
          <li>......</li>
          <li>......</li>
        </ul>
      </div>
    </div>

    <?php require 'footer.html'; ?>
  </body>
</html>
