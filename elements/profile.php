<?php
 session_start();
if(!isset($_SESSION['zalogowany']))
{
  header("Location:loggin.php");
  exit();
} 
 ?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muszyna</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style.resposive.css">
  </head>
  <body>
  <header>
  <div class="row ">
    <div class="logo col-sm-12">
      <a href="../index.php"><img src="../img/herb.png" width="50" height="50" alt="herb"> Muszyna</a>
    </div>
</header>
<div class="profile">
  <?php echo "<p style='text-align:center; font-size: 40px;'>Witaj ".$_SESSION['user']."!</p>";?>
  <div class="imgcontainer">
            <img src="../img/img_avatar2.png" alt="Avatar" class="avatar">
        </div>
  <button class="s-psw" onclick="s_passwd()">Zmień hasło</button>
  <div id="change-passwd">
  <form method="post" action="resetpsw.php">
    <input type="password" placeholder="Wpisz obecne hasło" name="psw" id="psw" required>
    <input type="password" placeholder="Wpisz nowe hasło" name="psw1" id="psw1" required>
    <input type="password" placeholder="Powtórz nowe hasło" name="psw2" id="psw2" required>
    <button type="submit">Wyślij nowe hasło</button>
</form>
  </div>
  <?php if(isset($_SESSION['blad']))
      {
        echo $_SESSION['blad'];
      }
				unset($_SESSION['blad']);
			?>
  <a href="logout.php"><button type="button" class="logoutbtn">Wyloguj się</button></a>
</div>
<?php
if($_SESSION['user']=="admin0143")
{


echo "<button onclick=\"s_edytor()\">Edytuj treść</button>
<div id=\"edytor\">";
require_once "connect.php";
try
{
    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    $rezultat = @$polaczenie->query(sprintf("SELECT * FROM tresc",));
    $i=1;
    echo "<div class=\"row\">";
    while ($wiersz = mysqli_fetch_row($rezultat)) 
    {
      echo "<div class=\"col-md-6 ramka-edytor\"><img src=\"../img/$wiersz[4]\" alt=\"$wiersz[27]\"><h2>$wiersz[3]</h2>
      <form action=\"edytor.php\" method=\"post\">
      <textarea name=\"id\" cols=\"1\" rows=\"1\">$wiersz[1]</textarea><button>Popraw treść</button></form></div>";
    }  
    echo "</div></div>";
    $polaczenie->close();
}
catch(Exception $e)
{
echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
echo '<br />Informacja developerska:'.$e;
} 
}
?>
<script src="../js/funkcje.js"></script>
  </body>
</html>