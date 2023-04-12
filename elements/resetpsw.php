<?php

 session_start();
 if(!isset($_SESSION['zalogowany']))
{
  header("Location:loggin.php");
  exit();
} 
require_once"connect.php";
	mysqli_report(0);

    $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

    if($polaczenie -> connect_errno)
    {
        echo "Failed to connect to MySQL: " . $polaczenie -> connect_errno;
		exit();
    }
    else
    {
        $haslo = $_POST['haslo'];
        $uzytkownik=$_SESSION['user']; 

        if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",$uzytkownik)))
		{
			$wiersz = $rezultat->fetch_assoc();
            $haslo = $_POST['psw']; 
            $haslo1 = $_POST['psw1']; 
            $haslo2 = $_POST['psw2']; 
            $wszystko_OK=true;
		    if(password_verify($haslo,$wiersz['pass']))
			{
                echo "pierwszy";
                
                    // sprawdzanie długość hasła jest odpowiednia
                if(strlen($haslo1)<8||(strlen($haslo1)>20))
                {
                    $wszystko_OK=false;
                    $_SESSION['blad']='<span style="color:red"><br>Hasło powinno zawierać od 8 do 20znaków!<br></span>';
                    header('Location:profile.php');
                }
                // sprawdzanie długości czy hasło są identyczne
                if($haslo1!=$haslo2)
                {
                    $wszystko_OK=false;
                    $_SESSION['blad']='<span style="color:red"><br>Hasła się różnią!<br></span>';
                    header('Location:profile.php');
                }
                // haszowanie haseł
                $haslo_hash=password_hash($haslo1,PASSWORD_DEFAULT);

					$rezultat->free_result();
                    if($wszystko_OK==true)
                    {
                      if($polaczenie->query("UPDATE uzytkownicy SET pass = '$haslo_hash' WHERE user='$uzytkownik'"))
                      {
                        $_SESSION['blad']='<span style="color:green"><br>Zmieniono hasło<br></span>';
                        header('Location: profile.php');
                      }
                      else
                      {
                        throw new Exception($polaczenie->error);
                      }
                    }
            }
            else
            {
                $_SESSION['blad']='<span style="color:red"><br>Nie prawidłowe stare hasło!<br></span>';
                header('Location:profile.php');
            }
				
		}

        $polaczenie->close();
    }


 ?>