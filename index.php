<?php
# require_once('core/init.php');
# var_dump(($GLOBALS['config']['sqlite']['host']['gls']));
?>

<!doctype html>
<html lang="hr">

  <head>
    <?php require_once('includes/html_head.html'); ?>
  </head>

  <body>

    <header class="bg-dark">
      <?php require_once('includes/header.php'); ?>
    </header>

    <div class="container">
      <form class="form-inline justify-content-center my-5" id="targetForm" method="post">
        <label class="sr-only" for="searchForm">Search</label>
        <input type="text" class="form-control mr-2" name="search" id="searchForm" placeholder="Search..." style="width: 600px;">
      </form>
    </div>

    <main class="container" id="results_div">
    </main>
    

  <script src="javascript/functions.js"></script>
  <script src="javascript/script.js"></script>

  </body>

</html>