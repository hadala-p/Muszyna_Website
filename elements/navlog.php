<header>
<div class="row ">
    <div class="logo col-sm-12 col-md-6">
      <div class="herb"><a href="index.php"><img src="img/herb.png" width="50" height="50" alt="herb"></a></div>
      <div class="muszyna"><a href="index.php">Muszyna</a></div>  
    </div>
    <div class="logoo col-sm-12 col-md-6">
      <div class="cytat col-sm-9">
        <div id="cytat1">Zwiedzaj niezwiedzone...</div>
        <div id="cytat2">Odkrywaj niedkryte...</div>
        <div id="cytat3">Spędzaj czas w Muszynie!</div>
      </div>
      <div class="con-zegar">
        <div class="zegar">
          <div class="circle" id="sc"><i></i></div>
          <div class="circle circle2" id="mn"><i></i></div>
          <div class="circle circle3" id="hr"><i></i></div>
          <span style="--i:1;"><b>1</b></span>
          <span style="--i:2;"><b>2</b></span>
          <span style="--i:3;"><b>3</b></span>
          <span style="--i:4;"><b>4</b></span>
          <span style="--i:5;"><b>5</b></span>
          <span style="--i:6;"><b>6</b></span>
          <span style="--i:7;"><b>7</b></span>
          <span style="--i:8;"><b>8</b></span>
          <span style="--i:9;"><b>9</b></span>
          <span style="--i:10;"><b>10</b></span>
          <span style="--i:11;"><b>11</b></span>
          <span style="--i:12;"><b>12</b></span>
        </div>
      </div>  
    </div>
  </div>
</header>
<nav class="topnav" id="myTopnav">
  <ul>
  <li><a href="index.php">Home</a></li>
    <li><a href="atrakcje.php">Atrakcje</a></li>
    <li class="btnn"><a href="zabytki.php">Zabytki</a></li>
    <li class="btnn"><a href="javascript:void(0);" onclick="myFunction2()">Dla aktywnych<i class="icon-down-open iconn"></i></a>
      <ul id="btn-content">
        <li><a href="szlaki_piesze.php">Wędrówki piesze</a></li>
        <li><a href="szlaki_rowerowe.php">Szlaki/Trasy rowerowe</a></li>
      </ul>
    </li>
    <li><a href="historia.php">Historia</a></li>
    <li class="log-btn blue"><a href="elements/profile.php"><?php echo $_SESSION['user']?></a></li>
  </ul>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">
<i class="icon-menu"></i>
</a>
</nav>