<?php session_start();
$_SESSION['location'] = "zabytki";
$location=$_SESSION['location'];
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muszyna-Zabytki</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
      <section id="tx">
        <?php include 'elements/atrakcje-zabytki.php';?>
      </section>
    </main>
    <?php include 'elements/footer.html';?>
    <script src="js/zegar.js"></script>
    <script src="js/funkcje.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>