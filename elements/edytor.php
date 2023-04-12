<?php session_start();
$_SESSION['location'] = "edytor";
$location=$_SESSION['location'];
if($_SESSION['user']!="admin0143")
{
  header('Location: ../index.php');
  exit();
}
if(!isset($_SESSION['zalogowany']))
{
  header("Location:../index.php");
  exit();
} 
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDYTOR</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style.resposive.css">
    <link rel="stylesheet" href="../fontello/css/fontello.css" type="text/css" />
  </head>
  <body>
    <main>
      <section id="tx">
      <?php
        require_once "connect.php";
        $id = $_POST['id'];
        try
        {
            $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
            $resolut=@$polaczenie->query(sprintf("SHOW COLUMNS FROM `tresc`"));
            $i=0;
            while($row = mysqli_fetch_array($resolut)){
                $tab1[$i] = $row['Field'];
                $i++;
            }
            $rezultat=@$polaczenie->query(sprintf("SELECT * FROM tresc WHERE id='%s'",$id));
            
            $wiersz = mysqli_fetch_row($rezultat);
            $i=0;
            echo "<form action=\"update.php\" method=\"post\">";
            while($i<38)
            {
            echo "<h2>Pole: $tab1[$i]</h2><textarea name=\"$tab1[$i]\" cols=\"50\" rows=\"10\">$wiersz[$i]</textarea>";
            $i++;
            }
            echo "<button>Popraw i wyślij</button>
            </form>";
            $polaczenie->close();
        }
        catch(Exception $e)
        {
        echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
        echo '<br />Informacja developerska:'.$e;
        } 
        ?>

      </section>
    </main>
    <?php include 'footer.html';?>
    <script src="js/zegar.js"></script>
    <script src="js/funkcje.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>