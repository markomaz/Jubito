<!doctype html>
<html lang="hr">

  <head>
    <?php require_once('includes/html_head.html'); ?>
  </head>

  <body>
    <header class="bg-dark">
      <?php require_once('includes/header.php'); ?>
    </header>

    <?php 
      $video_url = "https://www.youtube.com/embed/" . $_GET['videoId'] . "?rel=0&autoplay=1&enablejsapi=1";      
    ?>

    <main id="viewPanel" class="container my-5">
      <iframe id="videoPlayer" src="<?php echo $video_url; ?>" allow="autoplay" frameborder="0" enablejsapi="true"></iframe>
    </main>

    <script src="javascript/playVideoScript.js"></script>
  </body>
  
</html>