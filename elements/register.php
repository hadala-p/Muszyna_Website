<?php
 session_start();
 
 if(isset($_POST['email']))
 {
	 $wszystko_OK=true;
  //  sprawdzanie długości nicku
   $nick=$_POST['nick'];
   if(strlen($nick)<3||(strlen($nick)>20))
   {
     $wszystko_OK=false;
     $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
   }
// sprawdzanie liter podanego nicku
   if(ctype_alnum($nick)==false)
   {
     $wszystko_OK=false;
     $_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
   }
// sprawdzanie poprawności wprowadzonego e-mailu przez filtr
   $email=$_POST['email'];
   $emailB=filter_var($email,FILTER_SANITIZE_EMAIL);

   if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email))
   {
    $wszystko_OK=false;
    $_SESSION['e_email']="Podaj poprawny adres e-mail!";
   }

   $haslo1=$_POST['psw1'];
   $haslo2=$_POST['psw2'];
// sprawdzanie długość hasła jest odpowiednia
   if(strlen($haslo1)<8||(strlen($haslo1)>20))
   {
    $wszystko_OK=false;
    $_SESSION['e_haslo']="Haslo musi posiadać od 8 do 20 znaków";
   }
// sprawdzanie długości czy hasło są identyczne
   if($haslo1!=$haslo2)
   {
    $wszystko_OK=false;
    $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
   }
// haszowanie haseł
   $haslo_hash=password_hash($haslo1,PASSWORD_DEFAULT);

// akceptacja regulaminu

   if(!isset($_POST['regulamin']))
   {
    $wszystko_OK=false;
    $_SESSION['e_regulamin']="Niezaakceptowano regulaminu!";
   }

   require_once "connect.php";
   try
   {
    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    if($polaczenie -> connect_errno)
    {
        throw new Exception(mysqli_connect_errno());
    }
    else
    {
      // czy email istnieje
      $rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

      if(!$rezultat)
      throw new Exception($polaczenie->error);

      $ile_takich_maili = $rezultat->num_rows;
      if($ile_takich_maili>0)
      {
        $wszystko_OK=false;
        $_SESSION['e_email']="Istnieje juz konto zarejestrowane na podany email!"; 
      }
      // czy nick istnieje
      $rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

      if(!$rezultat)
      throw new Exception($polaczenie->error);

      $ile_takich_nickow = $rezultat->num_rows;
      if($ile_takich_nickow>0)
      {
        $wszystko_OK=false;
        $_SESSION['e_nick']="Istnieje juz użytkownik o takiej nazwie!"; 
      }

      if($wszystko_OK==true)
        {
          if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$nick','$haslo_hash','$email')"))
          {
            header('Location: loggin.php');
          }
          else
          {
            throw new Exception($polaczenie->error);
          }
        }

      $polaczenie->close();
    }

   }
   catch(Exception $e)
   {
     echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
     echo '<br />Informacja developerska:'.$e;
   }

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
  </div>
</header>
<div class="containerlg">

<form class="fo" method="post">
  <div class="container">
    <h1>Rejestracja</h1>
    <p>Wypełnij formularz aby utworzyć konto</p>
    <hr>

    <label for="nick"><b>Nick</b></label>
    <input type="text" placeholder="Wpisz nick" name="nick" id="nick" required>

    <?php
     if(isset($_SESSION['e_nick']))
     {
       echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
       unset($_SESSION['e_nick']);
     }
     ?>

    <label for="email"><b>E-mail</b></label>
    <input type="text" placeholder="Wpisz E-mail" name="email" id="email" required>

    <?php
     if(isset($_SESSION['e_email']))
     {
       echo '<div class="error">'.$_SESSION['e_email'].'</div>';
       unset($_SESSION['e_email']);
     }
     ?>

    <label for="psw1"><b>Hasło</b></label>
    <input type="password" placeholder="Wpisz hasło" name="psw1" id="psw1" required>

    <?php
     if(isset($_SESSION['e_haslo']))
     {
       echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
       unset($_SESSION['e_haslo']);
     }
     ?>

    <label for="psw2"><b>Powtórz hasło</b></label>
    <input type="password" placeholder="Powtórz hasło" name="psw2" id="psw2" required>
    <hr>

    <label><input type="checkbox" name="regulamin"/> Akceptuje regulamin</label>
    <?php
     if(isset($_SESSION['e_regulamin']))
     {
       echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
       unset($_SESSION['e_regulamin']);
     }
     ?>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Posiadasz już konto? <a href="loggin.php">Zaloguj się</a></p>
  </div>
</form>
</div>
</body>
</html>
