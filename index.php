<?php session_start();?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muszyna</title>
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
    <div class="row">
    <main class="col-md-8 col-lg-9 col-xl-10">
      <section class="recommended">
        <h1>Polecane</h1>
        <div class="img-slider">
          <div class="slide active">
            <a href="ogrodys.php"><img src="img/ogrodys.jpg" alt=""></a>
            <div class="info">
              <p>Ogrody Sensoryczne</p>
            </div>
          </div>
          <div class="slide">
            <img src="img/Cerkiew-Leluch-w-Konrad-Rogozi-ski_n-1517479217.jpg" alt="Cerkiew św. Dymitra w Leluchowie">
              <div class="info">
                <p>Cerkiew św. Dymitra w Leluchowie</p>
              </div>
          </div>
          <div class="slide">
            <a href="ogrodyb.php"><img src="img/ogrodyb.jpg" alt="Ogrody Biblijne"></a>
            <div class="info">
              <p>Ogrody Biblijne</p>
            </div>
          </div>
          <div class="slide">
            <a href="ogrodym.php"><img src="img/muszyna_miasto_ogrodow_1_1.jpg" alt="Ogrody Miłości"></a>
            <div class="info">
              <p>Ogrody Miłości</p>
            </div>
          </div>
          <div class="slide">
            <a href="aquavelo.php"><img src="img/aquavelo-muszyna.jpg" alt="Szlak rowerowy Aquavelo"></a>
            <div class="info">
              <p>Szlak rowerowy Aquavelo</p>
            </div>
          </div>
          <div class="navigation">
            <div class="btn active"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
          </div>
        </div>
      </section>
      <section class="index_news">
        <h1>Najnowsze</h1>
        <div class="row">
          <?php
          $location="atrakcje";
           include 'elements/news.php'; 
           ?>
        </div>
      </section>
      <section class="top_view">
        <h1>Najczęściej odwiedzane</h1>
        <div class="row">
          <?php
           include 'elements/top_odwiedzane.php'; 
           ?>
        </div>
      </section>
      <section class="index_atrakcje">
        <h1>Atrakcje</h1>
        <div class="row">
          <?php
          $location="atrakcje";
           include 'elements/odwiedzane.php'; 
           ?>
        </div>
      </section>
      <section class="index_zabytki">
        <h1>Zabytki</h1>
        <div class="row">
          <?php
          $location="zabytki";
           include 'elements/odwiedzane.php'; 
           ?>
        </div>
      </section>
    </main>
    <?php include 'elements/info_muszyna.html'; ?>
    </div>
    <?php include 'elements/footer.html'; ?>
    <script src="js/zegar.js"></script>
    <script src="js/funkcje.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slider.js"></script>
  </body>
</html>