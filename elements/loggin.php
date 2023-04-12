<?php
 session_start();
 
 if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
 {
	 header('Location: profile.php');
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
<body id="pix">
<header>
  <div class="row ">
    <div class="logo col-sm-12">
      <a href="../index.php"><img src="../img/herb.png" width="50" height="50" alt="herb"> Muszyna</a>
    </div>
  </div>
</header>
<div class="containerlg">

    <form class="fo" action="zaloguj.php" method="post">
        <div class="imgcontainer">
            <img src="../img/img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label><b>Twój nick:</b></label>
            <input type="text" placeholder="Wpisz nick" name="login" required>

            <label><b>Hasło:</b></label>
            <input type="password" placeholder="Wpisz hasło" name="haslo" required>
                
            <button type="submit">Zaloguj</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Zapamiętaj mnie
            </label>
			<?php if(isset($_SESSION['blad']))
      {
        echo $_SESSION['blad'];
      }
				unset($_SESSION['blad']);
			?>
        </div>

        <div class="container" style="background-color:#f1f1f1">
        <button class="cancelbtn" onclick="window.location.href='../index.php'">Cancel</button>
            <span class="psw">Nie posiadasz konta?  <a href="register.php">Zarejestruj się</a></span>
        </div>
    </form>
</div>
</body>
</html>
