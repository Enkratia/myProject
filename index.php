<?php
  if(isset($_POST['download'])){
    $imgUrl = $_POST['imgurl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $download = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment; filename="thumbnail.jpg"');
    echo $download;
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/15801db546.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <title>Youtube Thumbnail Downloader</title>
</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <header>Download Thumbnail</header>

    <div class="url-input">
      <div class="title">Paste video url:</div>
      <div class="field">
        <input type="text" placeholder="https://www.youtube.com/watch?v=FucPPCPDd2Y&list" required>
        <input class="hidden-input" type="hidden" name="imgurl">
        <div class="bottom-line"></div>
      </div>
    </div>

    <div class="preview-area">
      <img class="thumbnail" src="" alt="thumbnail">
      <i class="icon fas fa-cloud-download-alt"></i>
      <span>Paste video url to see preview</span>
    </div>

    <button class="download-btn" type="submit" name="download">Download Thumbnail</button>

  </form>


  <script src="script.js"></script>
</body>

</html>