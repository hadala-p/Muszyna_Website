<?php session_start();
$_SESSION['location'] = "CerkiewPow";
$location=$_SESSION['location'];
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muszyna-Cerkiew w Powroźniku</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style.resposive.css">
    <link rel="stylesheet" href="fontello/css/fontello.css" type="text/css" />
  </head>
  <body>
    <?php if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
      {include 'elements/navlog.php';}
      else
      {include 'elements/nav.html';}?>
    <main>
      <div class="wstep-nav">
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="zabytki.php">Zabytki</a></li>
          <li>Cerkiew w Powroźniku</li>
        </ul>
      </div>
      <section id="tx">
        <?php  {include 'elements/tresc.php';}?>
      </section>
      <?php
      $_SESSION['location'] = "CerkiewPow";
      $location=$_SESSION['location'];
       include 'elements/coments.php';?>
    </main>
    <?php  {include 'elements/licznik.php';}?>
    <?php include 'elements/footer.html';?>
    <script src="js/zegar.js"></script>
    <script src="js/funkcje.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/lightbox-plus-jquery.min.js"></script>
  </body>
</html>